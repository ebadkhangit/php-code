var xobj;
   //modern browers
   if(window.XMLHttpRequest)  {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else {
		  alert("Your broweser doesnot support ajax");
		  }	
		  
		  
		  

		  
		     function getmailaddress(){  
			if(xobj)
			{	
			
				var popupmailid = document.getElementById("popupmailid").value;
	if(popupmailid=="")
	{
		alert("Please enter mail address!");
		document.getElementById("popupmailid").focus();
		return false;
		
	}
		
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(!popupmailid.match(mailformat))
			{
				
			alert("You have entered an invalid email address!");
			document.form1.text1.focus();
			return false;
					
			}
		
	
			alert(popupmailid);
			  xobj.open("GET","popup_mailid.php?mailid="+popupmailid);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               alert(xobj.responseText);
	    //document.getElementById(showdataid).innerHTML=xobj.responseText;  
	    window.location.href="index.php?ss=1";
		           
		 } }                         
			  xobj.send(null);
                        }
		  } 
		  
		  
		  
      // >>>>>>>>>>>>>>>>>>>>  START ADMIN OPERATION DIR  >>>>>>>>>>>>>>>>>>>>>>>>        
	
           
        function pickpointfun(getpickloc,cattype){  
			if(xobj)
			{	
			//alert(getpickloc);
			//alert(cattype);
			var showdataid= 'showPickLocation_'+cattype;
			//alert(showdataid);
			  xobj.open("GET","fetch_pick_point.php?getloc="+getpickloc+"&catType="+cattype);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                             //  alert(xobj.responseText);
	    document.getElementById(showdataid).innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  } 
		  
		  
		  
		  
		  function setlocintexPick(locationPick,cat){		  
			  //alert(locationPick);
			  var showdataidTextbox= 'textboxsetValPick_'+cat;
			  //alert(showdataidTextbox);
			  document.getElementById(showdataidTextbox).value = locationPick;
			  document.getElementById('showPickLocation_'+cat).innerHTML = "";
			  document.getElementById('showDropLocation').innerHTML = "";			  
		     }
		  
		  
		  
        function droppointfun(getdroploc){  
			if(xobj)
			{	//alert(getdroploc);
		
			subplan = document.querySelector('input[name = "optradio"]:checked').value;	
			//alert(subplan);			
			  xobj.open("GET","fetch_drop_point.php?planName="+getdroploc+"&sub_plan="+subplan);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               //  alert(xobj.responseText);
	    document.getElementById('showDropLocation').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		  
		  function setlocintexDrop(locationPick){
			  //alert(locationPick);
			  document.getElementById('textboxsetValDrop').value = locationPick;
			   document.getElementById('showPickLocation').innerHTML = "";
			      document.getElementById('showDropLocation').innerHTML = "";
			  
		  }		





	function locationDetails(){
			if(xobj)
			{	
		
			subplan = document.querySelector('input[name = "optradio"]:checked').value;	
			textboxsetValPick = document.getElementById('textboxsetValPick').value;	
			//textboxsetValDrop = document.getElementById('textboxsetValDrop').value;	
			bookdt = document.getElementById('bookdt').value;	
			textboxsetValDrop = "Gurgaon";
			//alert(subplan);
			if(subplan=="Area Wise Corp"){
			 xobj.open("GET","show_detailsInd.php?subPlanName="+subplan+"&pickPoint="+textboxsetValPick+"&dropPoint="+textboxsetValDrop+"&bdt="+bookdt);	
			}else{
			  xobj.open("GET","show_details.php?subPlanName="+subplan+"&pickPoint="+textboxsetValPick+"&dropPoint="+textboxsetValDrop+"&bdt="+bookdt);			
			 
			 } xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                                // alert(xobj.responseText);
	    document.getElementById('showDetails').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
                        
                        }
	
	// login user
	
	function loginRequest(){
			if(xobj)
			{				
			var loginUsername=document.getElementById("loginUsername").value; 
			var loginPassword=document.getElementById("loginPassword").value; 
	
			if(loginUsername==""){
			alert('Enter username');
			document.getElementById('loginUsername').value;	
			document.getElementById('loginUsername').focus();
			}else if(loginPassword==""){
			alert('Enter password');
			document.getElementById('loginPassword').value;	
			document.getElementById('loginPassword').focus();
			}else{
						
			  xobj.open("GET","login-popup.php?username="+loginUsername+"&password="+loginPassword);
			  			 
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                                //alert(xobj.responseText);
                              if(xobj.responseText=="admin/dashboard.php"){
								  window.location.href="admin/dashboard.php";
                                }else if(xobj.responseText=="index.php"){
									 window.location.href="index.php";
								}else{
                                document.getElementById('errormsg').innerHTML=xobj.responseText;
                                }       
		 } }    
		 
		 }                    
			  xobj.send(null);
                        }
                        
                        }


	function userRegistration(){
			if(xobj)
			{				
			fname= document.getElementById('fname').value;	
			lname= document.getElementById('lname').value;			
			email= document.getElementById('email').value;	
			mobile= document.getElementById('mobile').value;	
			username= document.getElementById('username').value;
			pass= document.getElementById('pass').value;	
			c_pass= document.getElementById('c_pass').value;
			
			
			if(fname==""){
			alert('Enter First Name');
			document.getElementById('fname').value;	
			document.getElementById('fname').focus();
			return false;
			}
			if(lname==""){
			alert('Enter Last Name');
			document.getElementById('lname').value;	
			document.getElementById('lname').focus();
			return false;
			}
			if(email==""){
			alert('Enter Email Address');
			document.getElementById('email').value;	
			document.getElementById('email').focus();
			return false;
			}
			if(mobile==""){
			alert('Enter Mobile Number');
			document.getElementById('mobile').value;	
			document.getElementById('mobile').focus();
			return false;
			}
			if(username==""){
			alert('Enter Enter Username');
			document.getElementById('username').value;	
			document.getElementById('username').focus();
			return false;
			}
			if(pass==""){
			alert('Enter Password');
			document.getElementById('pass').value;	
			document.getElementById('pass').focus();
			return false;
			}
			if(c_pass==""){
			alert('Enter Confirm Password');
			document.getElementById('c_pass').value;	
			document.getElementById('c_pass').focus();
			return false;
			}			
			if(pass != c_pass){
			alert('Password and Confirm Password Not Matched!');
			document.getElementById('pass').value;	
			document.getElementById('pass').focus();
			return false;
			}else{					
			  xobj.open("GET","user-registration-code.php?fname="+fname+"&lname="+lname+"&email="+email+"&username="+username+"&pass="+pass+"&mobile="+mobile);			  			 
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                    //alert(xobj.responseText);
				   if(xobj.responseText == "success"){					  
					    document.getElementById('fname').value = "";	
						document.getElementById('lname').value = "";			
						document.getElementById('email').value = "";	
						document.getElementById('mobile').value = "";	
						document.getElementById('username').value = "";
						document.getElementById('pass').value = "";	
						document.getElementById('c_pass').value = "";
						 document.getElementById('msg').innerHTML="<div class='alert alert-success'>You have successfully registered</div>";
				   }else{
                    document.getElementById('msg').innerHTML=xobj.responseText;  
				 }				
				   					
		           
		 } }     
		 
		 }                    
			  xobj.send(null);
                        }
                        
                        }
	
	
		function trip_userRegistration(){
			if(xobj)
			{	
			fname_tr= document.getElementById('fname_tr').value;	
			lname_tr= document.getElementById('lname_tr').value;			
			email_tr= document.getElementById('email_tr').value;	
			mobile_tr= document.getElementById('mobile_tr').value;	
			username_tr= document.getElementById('username_tr').value;
			pass_tr= document.getElementById('pass_tr').value;	
			c_pass_tr= document.getElementById('c_pass_tr').value;
			//alert(fname_tr);		

			
			if(fname_tr==""){
			alert('Enter First Name');
			document.getElementById('fname_tr').value;	
			document.getElementById('fname_tr').focus();
			return false;
			}
			if(lname_tr==""){
			alert('Enter Last Name');
			document.getElementById('lname_tr').value;	
			document.getElementById('lname_tr').focus();
			return false;
			}
			if(email_tr==""){
			alert('Enter Email Address');
			document.getElementById('email_tr').value;	
			document.getElementById('email_tr').focus();
			return false;
			}
			if(mobile_tr==""){
			alert('Enter Mobile Number');
			document.getElementById('mobile_tr').value;	
			document.getElementById('mobile_tr').focus();
			return false;
			}
			if(username_tr==""){
			alert('Enter Enter Username');
			document.getElementById('username_tr').value;	
			document.getElementById('username_tr').focus();
			return false;
			}
			if(pass_tr==""){
			alert('Enter Password');
			document.getElementById('pass_tr').value;	
			document.getElementById('pass_tr').focus();
			return false;
			}
			if(c_pass_tr==""){
			alert('Enter Confirm Password');
			document.getElementById('c_pass_tr').value;	
			document.getElementById('c_pass_tr').focus();
			return false;
			}			
			if(pass_tr != c_pass_tr){
			alert('Password and Confirm Password Not Matched!');
			document.getElementById('pass').value;	
			document.getElementById('pass_tr').focus();
			return false;
			}else{					
			  xobj.open("GET","trip-registration.php?fname="+fname_tr+"&lname="+lname_tr+"&email="+email_tr+"&username="+username_tr+"&pass="+pass_tr+"&mobile="+mobile_tr);			  			 
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                    //alert(xobj.responseText);
				   if(xobj.responseText == "userexists"){		
					document.getElementById('tripmsg').innerHTML="<div class='alert alert-danger'>Username is already exists!</div>";
				   }else if(xobj.responseText == "success"){
					    document.getElementById('firstName').value = fname_tr;	
						document.getElementById('lastName').value = lname_tr;			
						document.getElementById('emailAddress').value = email_tr;	
						document.getElementById('phoneNumber').value = mobile_tr;						
						document.getElementById('tripmsg').innerHTML="<div class='alert alert-success'>You have successfully registered</div>";
						document.getElementById('hideTripForm').style.display="none"; 
				 }else{
                    document.getElementById('tripmsg').innerHTML=xobj.responseText;  
				 }				
				   					
		           
		 } }     
		 
		 }                    
			  xobj.send(null);
                        }
                        
                        }
	
	
	function trip_loginuser(){
			if(xobj)
			{					
			tripLoginUser= document.getElementById('tripLoginUser').value;	
			tripLoginPassword= document.getElementById('tripLoginPassword').value;	
			
			if(tripLoginUser==""){
			alert('Enter username');
			document.getElementById('tripLoginUser').value;	
			document.getElementById('tripLoginUser').focus();
			}else if(tripLoginPassword==""){
			alert('Enter password');
			document.getElementById('tripLoginPassword').value;	
			document.getElementById('tripLoginPassword').focus();
			}else{
						
			  xobj.open("GET","trip-login.php?username="+tripLoginUser+"&password="+tripLoginPassword);
			  			 
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               // alert(xobj.responseText);
                              if(xobj.responseText!=0){
                                var userdetail=xobj.responseText;
                                var arrcountValue= userdetail.split(',');
                                
                                document.getElementById('firstName').value=arrcountValue[0];
                                document.getElementById('lastName').value=arrcountValue[1];
                                document.getElementById('emailAddress').value=arrcountValue[2];
                                document.getElementById('phoneNumber').value=arrcountValue[3];
								document.getElementById('loginform').style.display="none";
								document.getElementById('userlogined').style.display="none";								
                                }else{
                                document.getElementById('triperrormsg').innerHTML="<div class='alert alert-danger'>Invalid username or password!</div>";
                              
							  }
                                
								     
		           
		 } }     
		 
		 }                    
			  xobj.send(null);
                        }
                        
                        }


<!--  Individual-->

        
        function pickpointfunInd(getpickloc){  
			if(xobj)
			{	
				
		 subplan = document.querySelector('input[name = "optradioInd"]:checked').value;
		    
			 //alert(subplan);
			  xobj.open("GET","fetch_pick_pointInd.php?location="+getpickloc+"&sub_plan="+subplan);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                                 //alert(xobj.responseText);
	    document.getElementById('showPickLocationInd').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  } 
		  
		  function setlocintexPickInd(locationPick){
			  //alert(locationPick);
			  document.getElementById('textboxsetValPickInd').value = locationPick;
			   document.getElementById('showPickLocationInd').innerHTML = "";
			      document.getElementById('showDropLocationInd').innerHTML = "";
			  
		  }
		  
		  
		  
        function droppointfunInd(getdroploc){  
			if(xobj)
			{	//alert(getdroploc);
		
			subplan = document.querySelector('input[name = "optradioInd"]:checked').value;	
			//alert(subplan);			
			  xobj.open("GET","fetch_drop_pointInd.php?planName="+getdroploc+"&sub_plan="+subplan);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               //  alert(xobj.responseText);
	    document.getElementById('showDropLocationInd').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
		  } 
		  
		  function setlocintexDropInd(locationPick){
			 // alert(locationPick);
			  document.getElementById('textboxsetValDropInd').value = locationPick;
			   document.getElementById('showPickLocationInd').innerHTML = "";
			      document.getElementById('showDropLocationInd').innerHTML = "";
			  
		  }
		  
		  function locationDetailsInd(){
			if(xobj)
			{	
		
			subplan = document.querySelector('input[name = "optradioInd"]:checked').value;	
			textboxsetValPick = document.getElementById('textboxsetValPickInd').value;	
			//textboxsetValDrop = document.getElementById('textboxsetValDropInd').value;
			textboxsetValDrop ="Gurgaon";	
			bookdt = document.getElementById('bookdtInd').value;	
		//alert(subplan);
		//alert(textboxsetValPick);
		//alert(textboxsetValDrop);
			
			  xobj.open("GET","show_detailsInd.php?subPlanName="+subplan+"&pickPoint="+textboxsetValPick+"&dropPoint="+textboxsetValDrop+"&bdt="+bookdt);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                                 //alert(xobj.responseText);
	                   document.getElementById('showDetails').innerHTML=xobj.responseText;      
		           
		 } }                         
			  xobj.send(null);
                        }
}


		  			function  totalmembers(selectMem){
		  						
							hidValue = document.getElementById('hidValue').value;
							
							totAmount = parseInt(selectMem) * parseInt(hidValue);
							
						   
						        
							document.getElementById('hideAmount').style.display="none";	
						        document.getElementById('showAmount').style.display="block";
						   
						             document.getElementById('totmemshow').innerHTML=selectMem;	
						        document.getElementById('totAmountshow').innerHTML=totAmount;
						        

							
							
							
							
							
							
							
							
		
			}
	  		  
		  
		  
	  

          