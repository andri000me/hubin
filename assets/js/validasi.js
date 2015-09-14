$.get('assets/js/jquery.validate.js',function(){
	// Validasi Login
	$('#login').validate({
		rules: {
			user: "required",
			pass: "required",
		},
		messages: {
			user: "Masukan Username",
			pass: "Masukan Password",
		}
	});
	// Validasi User
	$('#user').validate({
		rules: {
			user: "required",
			old_pass: "required",
			password: {minlength: 5},
			pass: {required:true,minlength: 5},
			re_pass: {required:true,minlength: 5,equalTo: "#pass"},
			nama_siswa: "required",
			email_siswa: "email",
		},
		messages: {
			user: "Masukan Username",
			old_pass: "Masukan Old Password",
			password: {minlength: "Mimimal 5 karakter"},
			pass: {required:"Masukan Password",minlength:"Minimal 5 karakter"},
			re_pass: {required:"Masukan Retype Password",minlength:"Minimal 5 karakter",equalTo:"Samakan dengan Password diatas!"},
			nama_siswa: "Masukan Nama Lengkap Siswa",
			email_siswa: "Isi Email dengan Benar",
		}
	});
	// Validasi Perusahaan
	$('#perusahaan').validate({
		rules: {
			user: "required",
			old_pass: "required",
			pass: {required:true,minlength: 5},
			re_pass: {required:true,minlength: 5,equalTo: "#pass"},
			nama_perusahaan: "required",
			email_perusahaan: {required:true,email:true},
			tlp_perusahaan: {required:true,number:true},
			alamat_perusahaan : "required",
			about_perusahaan : "required",
		},
		messages: {
			user: "Masukan Username",
			old_pass: "Masukan Old Password",
			pass: {required:"Masukan Password",minlength:"Minimal 5 karakter"},
			re_pass: {required:"Masukan Retype Password",minlength:"Minimal 5 karakter",equalTo:"Samakan dengan Password diatas!"},
			nama_perusahaan: "Masukan Nama Perusahaan",
			email_perusahaan: {required:"Masukan Email Perusahaan",email:"Isikan Email Perusahaan dengan Benar"},
			tlp_perusahaan : {required:"Masukan Telepon Perusahaan",number:"Isikan dengan angka"},
			alamat_perusahaan : "Masukan Alamat Perusahaan",
			about_perusahaan : "Masukan Tentang Perusahaan",
		}
	});
	// Validasi Biodata
	$('#biodata').validate({
		rules:{
			nama_siswa: "required",
			email_siswa: "email",
			tgl_lhr_siswa: "date",
			email_perusahaan: "email",
			tlp_siswa: "number",
			ktp_siswa: "number",
		},
		messages:{
			nama_siswa: "Masukan Nama",
			email_siswa: "Masukan email dengan benar",
			tgl_lhr_siswa: "Masukan tanggal lahir dengan benar",
			email_perusahaan: "Masukan email dengan benar",
			tlp_siswa: "Masukan dengan angka",
			ktp_siswa: "Masukan dengan angka",
		}
	});
	// Validasi Pendidikan Formal
	$('#pendidikan-formal').validate({
		rules:{
			awal_pndk_formal: {required:true,number:true},
			akhir_pndk_formal: {required:true,number:true},
			nama_pndk_formal: {required:true},
		},
		messages:{
			awal_pndk_formal: {required:"Required",number:"Angka"},
			akhir_pndk_formal: {required:"Required",number:"Angka"},
			nama_pndk_formal: {required:"Pendidkan Formal harus diisi"},
		}
	});
	// Validasi Pendidikan Formal
	$('#pendidikan-informal').validate({
		rules:{
			awal_pndk_informal: {required:true,number:true},
			akhir_pndk_informal: {required:true,number:true},
			nama_pndk_informal: {required:true},
		},
		messages:{
			awal_pndk_informal: {required:"Required",number:"Angka"},
			akhir_pndk_informal: {required:"Required",number:"Angka"},
			nama_pndk_informal: {required:"Pendidkan Informal harus diisi"},
		}
	});
	// Validasi Pengalaman Organisasi
	$('#pengalaman-organisasi').validate({
		rules:{
			awal_org: {required:true,number:true},
			akhir_org: {required:true,number:true},
			posisi_org: {required:true},
			nama_org: {required:true},
		},
		messages:{
			awal_org: {required:"Required",number:"Angka"},
			akhir_org: {required:"Required",number:"Angka"},
			posisi_org: {required:"Posisi harus diisi"},
			nama_org: {required:"Organisasi harus diisi"},
		}
	});
	// Validasi Pengalaman Organisasi
	$('#pengalaman-kerja').validate({
		rules:{
			pengalaman_kerja: {required:true}
		},
		messages:{
			pengalaman_kerja: {required:"Pengalaman Kerja harus diisi"}
		}
	});
	// Validasi Pengalaman Organisasi
	$('#keahlian-siswa').validate({
		rules:{
			ket_keahlian: {required:true}
		},
		messages:{
			ket_keahlian: {required:"Keahlian harus diisi"}
		}
	});
	// Validasi Pengalaman Organisasi
	$('#prestasi-siswa').validate({
		rules:{
			prestasi: {required:true}
		},
		messages:{
			prestasi: {required:"Prestasi harus diisi"}
		}
	});
	// Validasi Portofolio
	$('#portofolio').validate({
		rules:{
			title_portofolio: {required:true},
		},
		messages:{
			title_portofolio: {required:"Judul Portofolio harus diisi"},
		}
	});
	// Validasi Loker
	$('#loker').validate({
		rules:{
			judul_loker: {required:true},
			jumlah_requitment: {required:true,number:true},
			deskripsi_loker: {required:true},
		},
		messages:{
			judul_loker: {required:"Judul Loker harus diisi"},
			jumlah_requitment: {required:"Jumlah Requitment harus diisi",number:"Masukan dengan angka"},
			deskripsi_loker: {required:"Deskripsi Loker harus diisi"},
		}
	});
	/*Admin Validasi*/
	// Validasi Portofolio
	$('#posting').validate({
		rules:{
			title_posting: {required:true},
			content_posting: {required:true},
		},
		messages:{
			title_posting: {required:"Judul Posting harus diisi"},
			content_posting: {required:"Content Posting harus diisi"},
		}
	});
	// Validasi Prakerin
	$('#prakerin').validate({
		rules:{
			user: "required",
			old_pass: "required",
			pass: {required:true,minlength: 5},
			re_pass: {required:true,minlength: 5,equalTo: "#pass"},
			judul_laporan: "required",
			nama_siswa: "required",
			id_jurusan: "required",
			id_ta: "required",
			nama_perusahaan: "required",
		},
		messages:{
			user: "Masukan Username",
			old_pass: "Masukan Old Password",
			pass: {required:"Masukan Password",minlength:"Minimal 5 karakter"},
			re_pass: {required:"Masukan Retype Password",minlength:"Minimal 5 karakter",equalTo:"Samakan dengan Password diatas!"},
			judul_laporan: "Masukan Judul Laporan",
			nama_siswa: "Masukan Nama Siswa",
			id_jurusan: "Masukan Jurusan",
			id_ta: "Masukan Tahun",
			nama_perusahaan: "Masukan Nama Perusahaan",

		}
	});
	// Validasi Album
	$('#album').validate({
		rules:{
			nama_album: {required:true}
		},
		messages:{
			nama_album: {required:"Nama Album harus diisi"}
		}
	});
});
