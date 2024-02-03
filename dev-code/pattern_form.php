country code
  <input type="text" name="country_code" pattern="[A-Za-z]{3}" title="Three letter country code">
 username:
 <input name="username" id="username" pattern="[A-Za-z0-9]+"> 
 Username with 2-20 chars
^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$
Format: string+string|number 

Only letters (either case), numbers, and the underscore; no more than 15 characters.
[A-Za-z0-9_]{1,15} 

Only lowercase letters and numbers; at least 5 characters, but no limit
[a-zd.]{5,} 

Password:
    <p>A form with a password field that must contain 6 or more characters:</p>
   <input type="password" name="pw" pattern=".{6,}" title="Six or more characters">
   Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)
(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$
 
 <p>A form with a password field that must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter:</p>
 <input type="password" name="pw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

E-mail:
  <p>A form with an email field that that must be in the following order: characters@characters.domain (characters followed by an @ sign, followed by more characters, and then a ".". After the "." sign, add at least 2 letters from a to z:</p>
 <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> 
 
 Age: 
 
 <input type="number" size="6" name="age" min="18" max="99" value="21"><br>
 
Search: 
   <p>A form with a search field that CANNOT contain the following characters: ' or "</p>
   <input type="search" name="search" pattern="[^'\x22]+" title="Invalid input">
   
File:
<input type="file" name="pic" id="pic" accept="image/gif, image/jpeg" />
<input type="file" name="pic" accept="image/*">
<input type="file" accept="image/*" /> <!-- all image types --> 
<input type="file" accept="audio/*" /> <!-- all audio types --> 
<input type="file" accept="video/*" />   
<input type="file" name="pic"accept="image/*,application/pdf,video/mp4,video/*"/>
<input type="file" name="foo" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
<input type="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" /> 
   
