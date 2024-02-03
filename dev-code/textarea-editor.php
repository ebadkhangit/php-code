<div class="form-group">
											<label>Terms & Conditions<span class="text-danger">*</span></label>
											<textarea name="productdesc" id="productdesc" rows="8" class="form-control" placeholder="Enter product Discription"></textarea>
											  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
											    <script type="text/javascript">
                                                 bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });                                               
                                                </script>
										</div>
										
										
										
													<div class="form-group col-sm-6">
												<label>Desription<span class="text-danger">*</span></label>
												<textarea name="productdesc" id="productTitle" class="form-control"  row="7"><?php echo htmlspecialchars_decode (stripslashes($data['product_desc']));?></textarea>
												
											</div>
														<div id="sample">
                                        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                                        //<![CDATA[
                                                     bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                                                    //]]>
                                                  </script>
                                                  </div>
								
								
								
										
		<?php 								
$productdesc =  htmlspecialchars(addslashes(trim($productdesc)));
$productdesc =mysqli_real_escape_string($conn,$productdesc);


echo htmlspecialchars_decode(stripslashes($arr_cat['terms_con']));?>
