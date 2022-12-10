<template>
    <div style="display: flex;"><button class="white" @click="$router.go(-1)">Kembali</button></div>
    <div class="container">
            <div class="kiri">
                <div style="font-size: 32px; font-weight: bold; padding: 10px 0px;">FORM IDENTITAS</div>
                <div class="form-wrapper">
                    <div>
                        <label for="">
                            Nama Lengkap
                            <input type="text" name="" id="" placeholder="Masukkan Nama Lengkap..." v-model="form.username">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Telepon
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Telepon..." v-model="form.noTelp">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Kerabat/Orang Tua
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Kerabat/Orang Tua..." v-model="form.noOrtu">
                        </label>
                        
                    </div>
                    <div>
                        <div>
                            <label for="">
                                Tanggal Masuk
                                <input type="date" name="" id="" v-model="form.tglMasuk">
                            </label>
                            
                        </div>
                        <div style="margin-left: 10%;">
                            <label for="">
                                Durasi
                                <select name="durations" id="durations" v-model="form.durasi" @change="updateHarga(form.durasi)">
                                    <option value="1" >1 Bulan</option>
                                    <option value="12">1 Tahun</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div style="border: none;">
                        <label for="">
                            Unggah Foto KTP
                            <input type="file" name="" id="" style="border: none;" @change="onFileChange">
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
                            <select name="" id="" v-model="form.metodeBayar">
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
                        <div style="text-align: left; padding: 10px 20px;">
                            Kamar {{kamar.no_kamar}}
                            <div style="font-size: 30px;">Rp {{harga}}</div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="green" style="width: 90%; margin-top: 30px;" @click="sendForm()">BOOKING SEKARANG</button>
                </div>
            </div>
    </div>
</template>

<script>

import axios from 'axios';

export default{
    data(){
        return{
            idKamar: this.$route.params.id,
            kamar: {
                no_kamar:'4'
            },
            harga:'',
            form: {
                username: '',
                noTelp: '',
                noOrtu: '',
                tglMasuk: '',
                durasi: '1',
                foto: '',
                metodeBayar:'BNI/08222222',
                kamarId:''
            }
        }
    },
    methods:{
       async getRoom(){
            try {
                const res = await axios.get('/api/getKamarDetails/' + this.idKamar)
                console.log(res.data)
                this.kamar = res.data.kamar[0]
                this.harga = this.toPrice(this.kamar.harga)
            } catch (err) {
                console.log('error')
            }
       },
        toPrice(price) {
            console.log(price);
            var new_price = price.toString()
            new_price = new_price.split('')
            var n_dots = Math.floor(new_price.length / 3)
            console.log(n_dots);
            var it = 1
            // 1000.000
            for(it; it<n_dots+1; it++){
                var pos = new_price.length+1-it-3*it
                console.log(it, pos);
                new_price.splice(pos,0,'.')
            }
            return new_price.join('')
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.form.foto = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        async sendForm(){
            try {
                this.form.kamarId = this.idKamar
                console.log(this.form)
                await axios.post('/api/create_order', this.form)
            } catch (error) {
                console.log(error)
            }
        },
        updateHarga(val){
            console.log(val);
            this.harga =  this.kamar.harga * val
            this.harga = this.toPrice(this.harga)
        }
    },
    mounted(){
        this.getRoom()
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