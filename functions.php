<?php

//koneksi database dan cek koneksi
$koneksi = mysqli_connect("localhost","root","","jakartasejahtera");
if (mysqli_connect_errno()) {
    echo "koneksi database gagal :" . mysqli_connect_error();
}

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows ;
}

function tambahPemesanan($data){
    global $koneksi;

    //input
    $NamaPenjual = $data["NamaPenjual"];
    $NamaPembeli = $data["NamaPembeli"];
    $JumlahProduk = $data["JumlahProduk"];
    $JenisProduk = $data["jenis"];
    $KategoriProduk = $data["KategoriProduk"];
    $AlamatPembeli = $data["AlamatPembeli"];
    $Kota = $data["Kota"];
    $Provinsi = $data["Provinsi"];
    $KodePos = $data["KodePos"];
    $TanggalPemesanan = $data["TanggalPemesanan"];
    $Durasi = $data["DurasiPengirimanProduk"];

    $query = "INSERT INTO pemesanan 
        VALUES ('',
                '$NamaPenjual',
                '$NamaPembeli',
                '$JumlahProduk',
                '$JenisProduk',
                '$KategoriProduk',
                '$AlamatPembeli',
                '$Kota',
                '$Provinsi',
                '$KodePos',
                '$TanggalPemesanan',
                '$Durasi')
            ";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);

}

function tambahBahanBaku($data){
    global $koneksi;

    //input
    $nama = $data["nama"];
    $jumlah = $data["jumlah"];

    $query = "UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku + '$jumlah' WHERE namaBahanBaku = '$nama'";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);

}

function tambahOrderBahanProduk($data){
    global $koneksi;

    //input
    $nama = $data["nama"];
    $jumlah = $data["jumlah"];
    $tanggal = $data["tanggal"];
    $durasi = $data["durasi"];

    $query = "INSERT INTO pemesananbahanbaku
        VALUES ('',
                '$nama',
                '$jumlah',
                '$tanggal',
                '$durasi')
            ";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

function tambahSPK($data){
    global $koneksi;
    global $formulaproduk;

    //input
    $jenis = $data["jenis"];
    $kategori = $data["kategori"];
    $tanggal = $data["tanggal"];
    $formulaProduk = query("SELECT `matras`,
                                `busa`,
                                `ariKain`,
                                `rangkaDivan`,
                                `perSudut`,
                                `perPegas`,
                                `perBulat`,
                                `perPinggir`,
                                `kawatLis`,
                                `kawatKumparan`,
                                `Woven`,
                                `Dakron`,
                                `circleFiberFoam` 
                            FROM formulaproduk WHERE jenisProduk = '$jenis' AND kategoriProduk = '$kategori'
                            ")[0];
    //jumlah berdasarkan formula produk
    $jumlah = $data["jumlah"];
    $stock = array($formulaProduk["matras"] * $jumlah,
                    $formulaProduk["busa"] * $jumlah,
                    $formulaProduk["ariKain"] * $jumlah,
                    $formulaProduk["rangkaDivan"] * $jumlah,
                    $formulaProduk["perSudut"] * $jumlah,
                    $formulaProduk["perPegas"] * $jumlah,
                    $formulaProduk["perBulat"] * $jumlah,
                    $formulaProduk["perPinggir"] * $jumlah,
                    $formulaProduk["kawatLis"] * $jumlah,
                    $formulaProduk["kawatKumparan"] * $jumlah,
                    $formulaProduk["Woven"] * $jumlah,
                    $formulaProduk["Dakron"] * $jumlah,
                    $formulaProduk["circleFiberFoam"] * $jumlah);

    $query = "INSERT INTO suratperintahkerja
            VALUES ('',
                    '$jenis',
                    '$kategori',
                    '$tanggal',
                    '$jumlah');
            INSERT INTO spkmasuk
            VALUES ('',
                    '$jenis',
                    '$kategori',
                    '$tanggal',
                    '$jumlah',
                    '0');
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanbaku - '$stock[0]' WHERE namaBahanBaku = 'Matras';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[1]' WHERE namaBahanBaku = 'Busa/Foam';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[2]' WHERE namaBahanBaku = 'Ari Kain';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[3]' WHERE namaBahanBaku = 'Rangka Divan';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[4]' WHERE namaBahanBaku = 'Per Sudut';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[5]' WHERE namaBahanBaku = 'Per Pegas';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[6]' WHERE namaBahanBaku = 'Per Bulat';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[7]' WHERE namaBahanBaku = 'Per Pinggir';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[8]' WHERE namaBahanBaku = 'Kawat Lis';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[9]' WHERE namaBahanBaku = 'Kawat Kumparan';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[10]' WHERE namaBahanBaku = 'Woven';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[11]' WHERE namaBahanBaku = 'Dakron';
            UPDATE bahanbaku SET jumlahBahanBaku = jumlahBahanBaku - '$stock[12]' WHERE namaBahanBaku = 'Circle Fiber Foam';
            ";
    mysqli_multi_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}


function cekKualitas($data){
    global $koneksi;
    global $cekKualitas;
    $cekKualitas = $cekKualitas["id"];

    //input
    $jenis = $data["jenis"];
    $kategori = $data["kategori"];
    $jumlah = $data["jumlah"];
    $berhasil = $data["berhasil"];
    $cacat = $data["cacat"];
    $tanggal = date("Y-m-d");

    $query = "INSERT INTO laporanpengecekan
            VALUES ('',
                    '$jenis',
                    '$kategori',
                    '$tanggal',
                    '$jumlah',
                    '$berhasil',
                    '$cacat');
            UPDATE spkmasuk SET cek = '1' WHERE id = '$cekKualitas';
            ";

    mysqli_multi_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);

}

//hapus data
function hapus($id){
    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM spkmasuk WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}