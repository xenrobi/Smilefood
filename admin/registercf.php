<div class="container">
<h2>Form Pendaftaran Cafe</h2>
    <form action="aksiregistercf.php" method="post">
        <div class="form-group">
            <label>Nama Cafe:</label>
            <input type="text" name="cafe" class="form-control" placeholder="Masukan Cafe" required />
        </div>
	<div class="form-group">
            <label>Pemilik:</label>
            <input type="text" name="pemilik" class="form-control" placeholder="Masukan Nama" required/>
        </div>
	<div class="form-group">
	     <label>Alamat:</label>
	     <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required></textarea>
	</div> 
	<div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email"required />
        </div>
	<div class="form-group">
            <label>No Telp:</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukan No Yang Bisa Di Hubungi" required/>
        </div>
	<div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">DAFTAR</button>

    </form>
</div>