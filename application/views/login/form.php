<form id="loginForm" style="position: absolute;margin-top: -40%;margin-left: 38%;">
	
	<div class="login-wrapper" style="background-color: #ffffff59; padding:5px">
		<div class="form-group">
			<label style="" class="fir"><?php echo $title_web;?></label>
			<label class="sec">Admin Login</label>
			<div class="alert alert-warning" style="display: none;">
				<strong>Username atau password salah !</strong>
			</div>
		</div>
		<div class="login-component">
			<div class="form-group">
				<input type="text" name="username" class="ipt-login" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="ipt-login" placeholder="Password">
			</div>
			<br>
			<br>
			<button type="submit" class="ipt-submit">Login</button>
		</div>
	</div>

</form>

<script type="text/javascript">
	
	$('#loginForm').on('submit', function(){

		$.ajax({

			url:bu+'login/process',
			type:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{
				$('#loginForm').append(data);
			}

		});

		return false;

	});

</script>