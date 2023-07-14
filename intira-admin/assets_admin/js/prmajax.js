//Fungsi untuk autosuggest
function suggest(src)
{
	var page    = 'suggest.php';
	if(src.length>=2){
		var loading = '<p align="center">Loading ...</p>';
		showStuff('suggest');
		$('#suggest').html(loading);
		$.ajax({
			url: page,
			data : 'src='+src,
			type: "post", 
			dataType: "html",
			timeout: 10000,
			success: function(response){
				$('#suggest').html(response);
			}
		});
	}
}

//Fungsi untuk memilih kota dan memasukkannya pada input text
function pilih_kota(kota)
{
	$('#src').val(kota);
}

//menampilkan form div
function showStuff(id) {
	document.getElementById(id).style.display = 'block';
}
//menyembunyikan form
function hideStuff(id) {
	document.getElementById(id).style.display = 'none';
}