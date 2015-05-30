<?php require('dbconfig.php'); ?>
<?php $title="Contact Us"; ?>
<?php 
	// code here
?>
<?php require 'header.php'; ?>
<h2>Sign Up</h2>
<div class="row">
	<form action="" method="post">
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Name *</label>
				<input type="text" name="name" class="form-control" required/>
			</div>
			<div class="form-group">
				<label for="">Email Id *</label>
				<input type="text" name="email" class="form-control" required/>
			</div>
			<div class="form-group">
				<label for="">Name *</label>
				<select name="msg_type" id="msg_type" class="form-control" required>
					<option value="">Choose one</option>
					<option value="suggestion">Suggestion</option>
					<option value="complaint">Complaint</option>
					<option value="feedback">Feedback</option>
					<option value="query">Query</option>
				</select>
			</div>
			<div class="form-group">
				<?php 
					$a = rand(0,9);
					$b = rand(0,9);
					$c = $a+$b;
				?>
				<label for="">Answer this(<?php echo "$a + $b" ?>) *</label>
				<input type="text" name="captcha" class="form-control" required/>
			</div>
			<div class="form-group">
				<label for="">&nbsp;</label>
				<input type="submit" name="submit" class="btn btn-danger" value="Send Query" required/>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Phone *</label>
				<input type="text" name="phone" class="form-control" required/>
			</div>			
			<div class="form-group">
				<label for="">Location *</label>
				<input type="text" name="name" class="form-control" required/>
			</div>
			<div class="form-group">
				<label for="">Comment/Query *</label>
				<textarea name="msg" id="msg" cols="10" rows="5" class="form-control" required></textarea>
			</div>
		</div>
	</form>
</div>
<?php require 'footer.php'; ?>