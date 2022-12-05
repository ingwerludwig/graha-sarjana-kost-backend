<template>
    <div class="container">
        <form action="POST">
            <div class="kiri">
                <div class="wrapper">
                    <div>
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="" id="">
                    </div>
                    <div>
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="" id="">
                    </div>
                    <div>
                        <label for="">Nomor Kerabat/Orang Tua</label>
                        <input type="text" name="" id="">
                    </div>
                    <div>
                        <label for="">Tanggal Masuk</label>
                        <input type="date" name="" id="">
                    </div>
                    <div>
                        <label for="">Durasi</label>
                        <select name="durations" id="durations">
                            <option value="30">1 Bulan</option>
                            <option value="365">1 Tahun</option>
                        </select>
                    </div>
                    <div>
                        <label for=""><b>Unggah Foto KTP</b></label>
                        <input type="file" name="" id="">
                    </div>
                </div>
            </div>
            <div class="kanan">

            </div>
        </form>
    </div>
</template>

<script>

</script>

<style>
.kiri{
    width: 50%;
    padding: 20px 20px;

}
.wrapper{
    border: 1px solid black;
}
.kanan{
    width: 50%;
}
</style>