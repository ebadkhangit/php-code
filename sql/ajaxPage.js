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
      // >>>>>>>>>>>>>>>>>>>>  START ADMIN OPERATION DIR  >>>>>>>>>>>>>>>>>>>>>>>>        
	
       
        function getproductIMG(productId,imgpriority){	
			if(xobj)
			{	              
			  xobj.open("GET","fetch_product_img.php?productId="+productId+"&imgorder="+imgpriority);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               //alert(xobj.responseText);	 	   
	    document.getElementById('displayProductimg').innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  // user login Model click to product
		       function fetch_login_model(productid){	 
			if(xobj)
			{ 			    
			  xobj.open("GET","login-model.php?prdid="+productid);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {                          
                               	 	  // alert(xobj.responseText);
	    document.getElementById('viewLoginModel').innerHTML=xobj.responseText;     	  
	    window.scrollTo(500, 0);         
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		  // user login while click to product
		       function loginuser(){	
			if(xobj)
			{			
					
					
			 	     hidenproductId= document.getElementById('hidenproductId').value; 
				     username = document.getElementById('loginUserName').value;   				    
				     loginPass = document.getElementById('loginPass').value; 
				     
				     if(username==""){
				     alert('Email Address is empty');
				     document.getElementById('loginUserName').focus(); 
				     return false;
				     }else if(loginPass==""){
				     alert('Password is empty');
				     document.getElementById('loginPass').focus(); 
				     return false;
				     }
				      
				        			    
			  xobj.open("GET","login_product_user.php?uName="+username+"&upass="+loginPass);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                              // alert(xobj.responseText);
                               if(xobj.responseText==1){                                
                           window.location.href="product-discription.php?prdid="+hidenproductId;                         
                               }
                               
                               document.getElementById('loginUserName').value = username; 			    
			       document.getElementById('loginPass').value = loginPass;   
				     
                                document.getElementById('displayLoginMess').style.display="block";  	 	   
	    			document.getElementById('displayLoginMess').innerHTML=xobj.responseText;   
	    			  	           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		    // user signup while click to product
		       function userSignup(){	 
			if(xobj)
			{
				hidenproductId= document.getElementById('hidenproductId').value; 
				     userName= document.getElementById('userName').value;    				    
				          userMobile= document.getElementById('userMobile').value;  
				         userEmail= document.getElementById('userEmail').value;  
				           userPass= document.getElementById('userPass').value;  			       
				             
				       faltName= document.getElementById('faltName').value;  				     
				       streetName= document.getElementById('streetName').value; 
				       area= document.getElementById('area').value;  				     
				       cityName= document.getElementById('cityName').value; 
				       districtName= document.getElementById('districtName').value;  				     
				       stateName= document.getElementById('stateName').value; 
				       pinCode= document.getElementById('pinCode').value;  				     
				    
				       
				            /*     alert(hidenproductId);
				                alert(userName);
				         alert(companyName);
				       alert(companyName);				
				     alert(userEmail);
				     alert(userPass);
				     alert(userMobile);
				*/
				     if(userName==""){
				     alert('User Name is empty!');
				     document.getElementById('userName').focus(); 
				     return false;
				     }				   				     
				      else if(streetName==""){
				     alert('Street Name is empty!');
				     document.getElementById('streetName').focus(); 
				     return false;
				     } 
				      else if(cityName==""){
				     alert('City Name is empty!');
				     document.getElementById('cityName').focus(); 
				     return false;
				     } 
				      else if(districtName==""){
				     alert('District Name is empty!');
				     document.getElementById('districtName').focus(); 
				     return false;
				     } 
				      else if(stateName==""){
				     alert('State Name is empty!');
				     document.getElementById('stateName').focus(); 
				     return false;
				     } 
				      else if(pinCode==""){
				     alert('Pin Code is empty!');
				     document.getElementById('pinCode').focus(); 
				     return false;
				     }  
				     else if(userMobile==""){
				     alert('Mobile Number is empty!');
				     document.getElementById('userMobile').focus(); 
				     return false;
				     }   
				     else if(userEmail==""){
				     alert('Email Address is empty!');
				     document.getElementById('userEmail').focus(); 
				     return false;
				     }
				     else if(userPass==""){
				     alert('Password is empty!');
				     document.getElementById('userPass').focus(); 
				     return false;
				     }
				     
				     
	
   		     
	if(userMobile.length < 10 || userMobile.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    document.getElementById('userMobile').focus(); 
    return false;
  }    
  
   var atpos = userEmail.indexOf("@");
    var dotpos = userEmail.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=userEmail.length) {
        alert("Not a valid e-mail address");
        document.getElementById('userEmail').focus(); 
        return false;
    }	 
				          
			//alert(hidenproductId);
				    
			  xobj.open("GET","signup-product-user.php?userName="+userName+"&userPass="+userPass+"&userEmail="+userEmail+"&userMobile="+userMobile+"&prid="+hidenproductId+"&faltName="+faltName+"&streetName="+streetName+"&area="+area+"&cityName="+cityName+"&districtName="+districtName+"&stateName="+stateName+"&pinCode="+pinCode);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                              // alert(xobj.responseText); 
                               
                                 if(xobj.responseText==0){
                                    window.location.href="mail-success.php";
                                 //window.location.href="product-discription.php?prdid="+hidenproductId;                                                  
                               }else{                              
                               document.getElementById('userName').value = userName; 			    
			       document.getElementById('companyName').value = companyName; 
			       } 
			        
				     
            document.getElementById('displaySignupMess').style.display="block";  	 	   
	    document.getElementById('displaySignupMess').innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		  
// hide login product click model
function hideLoginModel(){
document.getElementById('viewLoginModel').innerHTML="";    
}


  // search products by users home page
		       function search_product(searchkeydatas){	 
			if(xobj)
			{ 		
			alert(searchkeydatas);	    
			  xobj.open("GET","quick-view.php?searchkeydatas="+searchkeydatas);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {                          
                               	 	   alert(xobj.responseText);
	    document.getElementById('viewSearchData').innerHTML=xobj.responseText;     	  
	             
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		
		 		 
	// user signup validation
	     function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))    
        return false;
    return true;
}



function checkNum(event)
{
 var ch = String.fromCharCode(event.keyCode);
     var filter = /[a-zA-Z ]/   ;
     if(!filter.test(ch)){
       alert("Number not valid!");
          event.returnValue = false;
     }

}


// close user signup validation

// sub category id set in session for filtration product
 function getSubCat(prCatid,prSubCatid,catValue,typecat){
//alert(typecat);	
 //alert(prCatid);
//alert(prSubCatid);
//alert(catValue);
if(typecat=="subCatName"){ prSubCatName= catValue;}else{prSubCatName= "";}
if(typecat=="color"){ prColor= catValue;}else{prColor= "";}
if(typecat=="price"){ prPrice= catValue;}else{prPrice= "";}
if(typecat=="size"){ prSize= catValue;}else{prSize= "";}

			if(xobj)
			{	              
			  xobj.open("GET","store-session-value-filterdata.php?catid="+prCatid+"&subcatid="+prSubCatid+"&subcat_name="+prSubCatName+"&subcat_color="+prColor+"&subcat_price="+prPrice+"&subcat_size="+prSize);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                               //alert(xobj.responseText);
                               	
                               document.getElementById('preProduct').innerHTML=""; 	   
	   document.getElementById('viewFilterProduct').innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		   function removeValueStoreInSessionw(getval){
		   document.getElementById(getval).style.display="none"; 
 			}
                        
 function removeValueStoreInSession(cat,getval){
 			if(xobj)
			{ 
			alert(getval);	
			alert(cat);
			 document.getElementById(getval).style.display="none"; 			    
			  xobj.open("GET","remove-product-filterdata.php?subcat_color="+getval+"&catid="+cat);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {                          
                               	 	   alert(xobj.responseText);
	    document.getElementById('viewFilterProduct').innerHTML=xobj.responseText;     	  
	             
		 } }                         
			  xobj.send(null);
                        }
	
}

function productAddIncart(pid,qty){
	if(xobj)
			{	
			//alert(pid);  
			//alert(qty); 		  
		
						     
			           
			  xobj.open("GET","add_product_cart.php?pid="+pid+"&qty="+qty);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                              // alert(xobj.responseText);	
                         // show cqrt qty right
                         var pre_prqty=document.getElementById('show_count2').innerHTML;
                         if(pre_prqty==0){pre_prqty=0;}
			var after_prqty=parseInt(pre_prqty)+parseInt(1);				
			     document.getElementById('show_count2').innerHTML=parseInt(after_prqty);
			               
                               document.getElementById('ok'+pid).style.display="block";	 
                               document.getElementById(pid).style.display="none";	   
	    document.getElementById('addPIDinSessionMessg').innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
}

function showSelectPro(){
	if(xobj)
		{
						
			    
                          
			  xobj.open("GET","select_product.php");			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                            //  alert(xobj.responseText);	 
                               var countaddpro=document.getElementById('countselectPro').value;
			             alert(countaddpro);
			              // document.getElementById("show_selected_producTTt").innerHTML=countaddpro;  
                            	  
	    document.getElementById("show_selected_product").innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
}

 // search products by users home page
		       function search_product(searchkeydatas){	 
			if(xobj)
			{ 		
			//alert(searchkeydatas);	    
			  xobj.open("GET","featch-search-data.php?searchkeydatas="+searchkeydatas);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {                          
                               	 	//   alert(xobj.responseText);
          
	    document.getElementById('viewSearchData').innerHTML=xobj.responseText;     	  
	             
		 } }                         
			  xobj.send(null);
                        }
		  }
		  
		  
		   // search products by users home page
		       function addwishlist(pid,qty){	 
			if(xobj)
			{ 		
			//alert(pid);
			//alert(pid);	    
			  xobj.open("GET","add_wishlist.php?pid="+pid+"&qty="+qty);			
			  xobj.onreadystatechange=function() {
				 if(xobj.readyState==4 && xobj.status==200) {
                              // alert(xobj.responseText);	
                         // show cqrt qty right
                         var pre_prqty=document.getElementById('wp_show_count2').innerHTML;
                        if(pre_prqty==""){pre_prqty=0;}
			var after_prqty=parseInt(pre_prqty)+parseInt(1);	
			//alert(after_prqty);			
			     document.getElementById('wp_show_count2').innerHTML=after_prqty;			               
                                document.getElementById('off'+pid).style.display="block";	 
                              document.getElementById('wp'+pid).style.display="none";	   
	                   // document.getElementById('addWishlistPIDinSessionMessg').innerHTML=xobj.responseText;     	           
		 } }                         
			  xobj.send(null);
                        }
}
		  
		   // search products by users home page
		       function fetch_clik_link_products(pid,type){
		      // alert(type);
		      // alert(pid);
		       if(type!="cat")	{		
				window.location.href="product-description.php?pid="+pid;		  
			 		 }else{
			 	window.location.href=pid;	 
			 		 }
		 		 }