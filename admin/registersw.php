<div class="container">
<h2>Form Pendaftaran User</h2>
    <form action="aksiregistersw.php" method="post">
    <div class="form-group">
            <label>NIM:</label>
            <input type="number" name="nim" class="form-control" placeholder="Masukan Nomor Induk" required/>
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required/>
        </div>
	<div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
	<div class="form-group">
            <label>No Telp:</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukan No Yang Bisa Di Hubungi" required/>
        </div>
	<div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
        </div>

        <button type="submit" name="submit" class="btn btn-primary">DAFTAR</button>

    </form>
</div>