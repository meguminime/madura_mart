<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop any existing table with the same name first
        DB::statement("DROP TABLE IF EXISTS vwpurchases");
        
        DB::statement("
            CREATE OR REPLACE VIEW vwpurchases AS
            SELECT
                p.id AS id_purchases,
                p.no_nota,
                p.tgl_nota,
                p.id_distributor,
                d.name_distributor,
                pd.id AS id_PD,
                pd.id_barang,
                pr.nama_barang,
                pr.jenis_barang,
                pr.tgl_expired,
                pr.harga_jual,
                pr.stok,
                pr.foto_barang,
                pd.harga_beli,
                pd.margin_jual,
                pd.jumlah_beli,
                pd.subtotal,
                p.total_bayar
            FROM purchases p
            JOIN purchase__details pd ON p.id = pd.id_pembelian
            JOIN products pr ON pd.id_barang = pr.id
            JOIN distributors d ON p.id_distributor = d.id
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vwpurchases");
    }
};
