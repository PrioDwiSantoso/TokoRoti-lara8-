<?php

            /**
             * author : Suryo Atmojo <suryoatm@gmail.com>
             * project : supresso Laravel
             * Start-date : 19-09-2022
             */
            /**
             “Barangsiapa yang memberi kemudharatan kepada seorang muslim, 
            maka Allah akan memberi kemudharatan kepadanya, 
            barangsiapa yang merepotkan (menyusahkan) seorang muslim 
            maka Allah akan menyusahkan dia.”
            */
            
            namespace App\Models;
            
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class Tbl_transaksi extends Model
            {
                use HasFactory;
                protected $table = "tbl_transaksi";
                protected $fillable = [
                    "id_product",
"id_pelanggan",
"no_transaksi",
"frame_price",
"total_price",
"deleted",

                ];
            }
            ?>