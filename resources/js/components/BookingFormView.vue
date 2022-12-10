<template>
    <div style="display: flex;"><button class="white" @click="$router.go(-1)">Kembali</button></div>
    <div class="container">
            <div class="kiri">
                <div style="font-size: 32px; font-weight: bold; padding: 10px 0px;">FORM IDENTITAS</div>
                <div class="form-wrapper">
                    <div>
                        <label for="">
                            Nama Lengkap
                            <input type="text" name="" id="" placeholder="Masukkan Nama Lengkap...">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Telepon
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Telepon...">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Kerabat/Orang Tua
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Kerabat/Orang Tua...">
                        </label>
                        
                    </div>
                    <div>
                        <div>
                            <label for="">
                                Tanggal Masuk
                                <input type="date" name="" id="">
                            </label>
                            
                        </div>
                        <div style="margin-left: 10%;">
                            <label for="">
                                Durasi
                                <select name="durations" id="durations">
                                    <option value="30">1 Bulan</option>
                                    <option value="365">1 Tahun</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div style="border: none;">
                        <label for="">
                            Unggah Foto KTP
                            <input type="file" name="" id="" style="border: none;">
                        </label>
                    </div>
                </div>
            </div>
            <div class="kanan">
                <div class="pembayaran">
                    <div style="font-size: 32px; font-weight: bold; padding: 10px 0px;">METODE PEMBAYARAN</div>
                    <div class="content">
                        <label for="">
                            Pilih Bank/Nomor Rekening
                            <select name="" id="">
                                <option value="BNI/08222222">BNI/08222222</option>
                            </select>
                            <div style="display: flex;">
                                <img src="../../assets/bca.png" alt="">
                                <img src="../../assets/bni.png" alt="">
                            </div>
                        </label>
                    </div>
                </div>
                <div class="detail-booking">
                    <div style="font-size: 32px; font-weight: bold; padding: 10px 0px;">DETAIL BOOKING</div>
                    <div style="display: flex;">
                        <div class="gambar">

                        </div>
                        <div>
                            Kamar 103
                            <div>Rp 1.300.000</div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="green" style="width: 90%; margin-top: 30px;">BOOKING SEKARANG</button>
                </div>
            </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default{
        data (){
            return{
                rooms:[]
            }
        },
        methods:{
            getRooms (){
                axios.get('./api/getKamarDetails'+id).then(response => (
                    this.rooms = response.data.kamar,
                    console.log(response.data),
                    this.rooms.forEach((room) => {
                        room.fasilitas = room.fasilitas.split(',')
                    })
                ))
            },
            toPrice(price) {
                var new_price = price.toString()
                new_price = new_price.split('')
                new_price.splice(new_price.length-3*1,0,'.')
                new_price.splice(new_price.length-1-3*2,0,'.')
                console.log(new_price)
                return new_price.join('')
            }
        },
        mounted(){
            this.getRooms()
        }
    }
</script>

<style scoped>
.container{
    padding: 30px 30px;
    display: flex;
}
.kiri{
    width: 40%;
    padding: 20px 20px;
    border: none;
    border-radius: 5px;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.094);

}
.form-wrapper{
    font-weight: 550;
}
.form-wrapper > div{
    display: flex;
    padding:10px 10px;
}
.form-wrapper > div > div{
    display: flex;
}
.form-wrapper input{
    margin: 10px 0px;
}
.form-wrapper label{
    text-align: left;
    width: 100%;
}
select{
    display: block;
    margin: 10px 0px;
    padding: 5px 0px;
    padding-left: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
    height: 38px;
    width: 100%;
    font-family: Avenir, Helvetica, Arial, sans-serif;
}

.kanan{
    font-weight: 550;
    width: 50%;
    margin-left: 50px;
}
.pembayaran{
    padding: 20px 20px;
    border: none;
    border-radius: 5px;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.094);
}
.content{
    text-align: left;
}
.detail-booking{
    margin-top: 40px;
    padding: 20px 20px;
    border: none;
    border-radius: 5px;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.094);
}

.gambar{
    width: 100px;
    height: 100px;
    border: 1px solid black;
}
img{
    margin-left: 10px;
    width: 50px;
    height: auto;
}

</style>