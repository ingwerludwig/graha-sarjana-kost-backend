<template>
    <div style="display: flex;"><button class="white" @click="$router.go(-1)">Kembali</button></div>
    <div class="container">
            <div class="kiri">
                <div style="font-size: 32px; font-weight: bold; padding: 10px 0px;">FORM IDENTITAS</div>
                <div class="form-wrapper">
                    <div>
                        <label for="">
                            Nama Lengkap
                            <input type="text" name="" id="" placeholder="Masukkan Nama Lengkap..." v-model="form.nama_penghuni">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Telepon
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Telepon..." v-model="form.no_telp">
                        </label>
                        
                    </div>
                    <div>
                        <label for="">
                            Nomor Kerabat/Orang Tua
                            <input type="text" name="" id="" placeholder="Masukkan Nomor Kerabat/Orang Tua..." v-model="form.no_kerabat">
                        </label>
                        
                    </div>
                    <div>
                        <div>
                            <label for="">
                                Tanggal Masuk
                                <input type="date" name="" id="" v-model="form.date_mulai">
                            </label>
                            
                        </div>
                        <div style="margin-left: 10%;">
                            <label for="">
                                Durasi
                                <select name="durations" id="durations" v-model="form.durasi_kost" @change="updateHarga(form.durasi_kost)">
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
                            <select name="" id="" v-model="form.metode_pembayaran">
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
            total_harga:'',
            form: {
                nama_penghuni: '',
                no_telp: '',
                no_kerabat: '',
                date_mulai: '',
                durasi_kost: '1',
                foto_ktp: '',
                metode_pembayaran:'BNI/08222222',
                kamar_id:''
            }
        }
    },
    methods:{
       async getRoom(){
            try {
                const token = JSON.parse(localStorage.getItem('user')).token
                console.log(token)
                axios.defaults.headers.common.Authorization = 'Bearer '+ token;
                const res = await axios.get('/api/getKamarDetails/' + this.idKamar)
                console.log(res.data)
                this.kamar = res.data.kamar[0]
                this.harga = this.toPrice(this.kamar.harga)
                this.total_harga = this.kamar.harga
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
            this.form.foto_ktp = e.target.files[0];
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.form.foto_ktp = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        async sendForm(){
            try {
                this.form.kamar_id = this.idKamar
                console.log(this.form)

                let formData = new FormData()
                formData.append('nama_penghuni',this.form.nama_penghuni)
                formData.append('no_telp', this.form.no_telp)
                formData.append('no_kerabat', this.form.no_kerabat)
                
                // change date format
                this.form.date_mulai = this.form.date_mulai.split('-')
                const date = this.form.date_mulai[1] + '/' + this.form.date_mulai[2] + '/' + this.form.date_mulai[0]
                console.log(date)
                formData.append('date_mulai', date)

                formData.append('durasi_kost', this.form.durasi_kost)
                formData.append('total_harga',this.total_harga)
                formData.append('metode_pembayaran', this.form.metode_pembayaran)
                formData.append('foto_ktp',this.form.foto_ktp)
                formData.append('kamar_id',this.form.kamar_id)
                formData.append('_method', 'POST')

                await axios.post("/api/create_order", formData,{headers:{'Content-Type': 'multipart/form-data'}})
                .then(response => {
                    const orderId = response.data.order.id
                    this.$router.push('/payment/'+orderId);
                    console.log("Successfully uploaded: ", response.data)
                })
                .catch(err => {
                    for (var key of formData.entries()) {
                        console.log(key[0] + ', ' + key[1])
                    }   
                    console.error("error occurred: ", err)
                })

                
            } catch (error) {
                console.log(error)
            }
        },
        updateHarga(val){
            console.log(val);
            this.harga =  this.kamar.harga * val
            this.total_harga = this.harga
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