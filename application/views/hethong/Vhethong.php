<div class="container">
	<br> <br> <br>
	<center><h1>CHỨC NĂNG ĐÓNG, MỞ HỆ THỐNG</h1></center>
	<br> <br>
	<form action="" method="post">
		<div class="text-center">
			{if $trangthai_hethong['trangthai_hethong'] == 'mo'}
			<button type="submit" class="btn btn-warning btn-lg" value="donghethong" name="donghethong" onclick=" return confirm('Bạn có chắc chắn muốn thực hiện chức năng này không');">Đóng hệ thống</button>
			{/if}
			{if $trangthai_hethong['trangthai_hethong'] == 'dong'}
			<button type="submit" class="btn btn-primary btn-lg" value="mohethong" name="mohethong" onclick=" return confirm('Bạn có chắc chắn muốn thực hiện chức năng này không');">Mở hệ thống</button>
			{/if}
		</div>
	</form>
</div>