
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">\
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="../public/css/profile.css">

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../public/javascript/logout.js"></script>
	<script src="../public/javascript/update.js"></script>
	<script src="../public/javascript/handle.js"></script>
	
	<title>Profile</title>
</head>
<body>
	<?php
		include_once "./public/data/initData.php";
		
		if(!isset($_SESSION['email'])){
			header("Location: localhost:8080/login");
		}
		
		

	?>
	<div id='loading-wrap' style='position:fixed; height:100%; width:100%; overflow:hidden; top:0; left:0; display:none'>
        <div id='loading-message'>
            <div class='loader'>
            </div>
            <div class='message'></div>
        </div>
    </div>
	<div class="all-page">
		<div class="left-menu">

			<div class="avatar">
				<img src="<?= ($avatar)?($imageURL):$imageDefault?>" alt="" class="avatar-image" >
			</div>

			<div class="item item1">Account</div>
			<div class="item item2">Notification</div>
			<div class="item item3">Member</div>
			<div class="item item4">Group</div>
			<div class="item item5">Guest</div>
			<div class="item item6">App</div>
			<div class= "item item7 more" id="logout-button">Log Out</div>

		</div>
		<div class="right-menu">
			<div class="list-item">
				<div class="header">
					<div class = "name"><?= $name?></div>
					<div class="sub-username"><?= $user_name?></div>
				</div>
			<div class="box-wrap">
				<div class="title">USER INFORMATION</div>
				<div class="user-box box">
					<div class="text text1  make-blue">Account overview</div>
					<div class="text text2">Edit</div>
					<div class="text text3">Language</div>
					<div class="text text4">Change Password</div>
					<div class="text text5">Change Color</div>
					<div class="text text6">Schedule</div>
					<div class="text text7">2-factor authentication</div>
				</div>

			</div>
			<div class="box-wrap">
				<div class="title">APP - SECURITY</div>
			</div>
			<div class="box-wrap">
				<div class="title">ADVANCED SETTINGS</div>
				<div class="setting-box box">
				<div class="text text8">Log In History</div>
					<div class="text text9">Manage Device</div>
					<div class="text text10">Setting Email</div>
					<div class="text text11">Setting Timezone</div>
					<div class="text text12">On-leave delegation</div>
				</div>
			</div>

			</div>

		</div>
	<div class="super-main">
	<div class = "header">
	<div class="navbar">
		<div class="left">
		<a href=""><i class="fas fa-arrow-left"></i></a>
		<div class = "infor">
			<div class="label">
			Account
	
			</div>
			
			<div class = "title"><?= $last_name." ".$first_name?> <?= ($job_title)?(" · ".$job_title):"" ?></div>
			
			
		</div>
		</div>
		
			<Button class = "right more" onclick="open1()">Update Your Profile</Button>
		
		
	</div>
	</div>

  <div class="main-body"> 
 
  <div class="container">
		<div class="profile">
			<div class="main">
				<form action="" id="imageForm">
				<img src="<?= ($avatar)?($imageURL):$imageDefault?>" alt=""  class = "avatar-image">
				<input type="file" onchange="chooseFile(this)" id="imageFile">
			   
				</form>
				
				<div class="text">
					<div class="title"><?= $last_name." ".$first_name?></div>
					<div class="subtitle"><?= ($job_title)?$job_title:"Chưa cập nhật chức danh"?></div>
					<div class="infor">
					   <div class="sub-title">Email Address</div>
					   <div class="value"><?= $email?></div>
					</div>

					<div class="infor">
					   <div class="sub-title">Phone Number</div>
					   <div class="value"><?= ($phone_number)?$phone_number:""?></div>
					</div>

					<div class="infor">
					   <div class="sub-title">Direct managers</div>
					   <div class="multi-value value">
							<a href="">Nguyễn Trường Hiệp (Harry)</a>
							<a href="">Nguyễn Phi Hùng</a>
					   </div>
					</div>
					
				</div>
			</div>
		   

		</div>
		<div class="list">
			<div class="title">CONTACT INFOR</div>
			<div class="contact-infor">
				<div class="address">Address</div>
				<div class="address-value"><?= ($address)?($address):"" ?></div>
			</div>
		</div>

		<div class="list">
			<div class="title">USER GROUPS(2)</div>
			<div class="item more-infor">
				<div class="name ">Base HN</div>
				<div class="infor ">226 members since 30-11-2022</div>
			</div>
			<div class="item more-infor">
				<div class="name">Product</div>
				<div class="infor">82 members since 28-11-2022</div>
			</div>
		</div>
		<div class="list">
		<div class="title">DIRECT REPORT(0)</div>
		</div>

		<div class="list">
		<div class="title plus-circle">EDUCATION BACKGROUND</div>
		<div class="item-none">No information.</div>
		</div>

		<div class="list">
		<div class="title plus-circle">WORK EXPERIENCES</div>
		<div class="item-none">No information.</div>
		</div>

		<div class="list">
		<div class="title plus-circle">HONORS AND AWARDS</div>
		<div class="item-none">No information.</div>
		</div>

  </div>
  
	</div>
  </div>

 
  </div>
	</div>



	</div>
	<div class="update-form" id = "fix-box">
	<div class="form-table">
	<form action="" method = "POST" enctype="multipart/form-data" id="formData"> 
		<div class="form-header">
		<div class="header-title">Upadate Profile</div>
		<div class = "icon-button"><i class="fa-solid fa-x more" onclick="close1()"></i></div>
		
		</div>
		
		<div class="box-infor">
		<div class="row">
				<div class="label">First Name
					<div class="subtitle">First Name</div>

				</div>
				
				<input type="text"  name="first_name" id="" value="<?= ($first_name)?$first_name:""?>" placeholder="Your First Name">
				

			</div>

			<div class="row">
				<div class="label">Last Name
					<div class="subtitle">Last Name</div>

				</div>
				
				<input type="text"  name="last_name" id="" value="<?= ($last_name)?$last_name:""?>" placeholder="Your Last Name">
				

			</div>

			<div class="row">
				<div class="label">Email
					<div class="subtitle">Email</div>

				</div>
				
				<input type="text"  name="email" id="email-input" value="<?= ($email)?$email:""?>" placeholder="Your Email" readonly>
				

			</div>
			<div class="row">
				<div class="label">Username
					<div class="subtitle">Username</div>

				</div>
				
				<input type="text"  name="user_name" id="username-input" value="<?= ($user_name)?$user_name:""?>" placeholder="Your Username" readonly>
				

			</div>
			<div class="row">
				<div class="label">Job Title
					<div class="subtitle">Job Title</div>

				</div>
				
				<input type="text"  name="job_title" id="" value="<?= ($job_title)?$job_title:""?>" placeholder="Your Job">
				

			</div>
			<div class="row">
				<div class="label">Avatar
					<div class="subtitle" >Avatar</div>

				</div>
				
				<input type="file" id="image-File" name="uploadfile" <?= ($avatar)?$avatar:""?>>
				

			</div>
			<div class="row">
				<div class="label">Date Of Birth
					<div class="subtitle">Date Of Birth</div>

				</div>
				
				<input type="date"  name="date_of_birth" id="" value="<?= ($date_of_birth)?$date_of_birth:""?>" placeholder="Your Birthday">
				

			</div>
			<div class="row">
				<div class="label">Phone Number
					<div class="subtitle">Phone Number</div>

				</div>
				
				<input type="text"  name="phone_number" id="" value="<?= ($phone_number)?$phone_number:""?>" placeholder="Your Phone Number">
				

			</div>
			<div class="row">
				<div class="label">Address
					<div class="subtitle">Address</div>

				</div>
				
				<input type="text"  name="address" id="" value="<?= ($address)?$address:""?>" placeholder="Your Address">
			</div>
		</div>
		<div class="footer">
		<div class="footer-button">
			<div class="left-button more" onclick="close1()">
				Discard
			</div>
			<div class="right-button">
				<button class = "more" type="submit" id="update-button">Update</button>
			</div>
		</div>
		</div>
		

</form>

	</div>
</body>
</html>