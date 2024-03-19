     <li>
									  <?php if($productArray['product_mgmnt_type'] == 'BD')
									  { ?>
                                                <a title="Edit Product" class="" href="product_edit.php?pid=<?php echo $productArray['id'].'&backstr='.$backbtnStr; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <?php }else{ ?>
                                                    <a title="Edit Product" class="" href="product_edit_cr.php?pid=<?php echo $productArray['id'].'&backstr='.$backbtnStr; ?>"><i class="fa fa-pencil"></i> Edit
                                                </a>
                                            <?php } ?>
											
											</li>
											
											<?php if($productArray['type'] == 'BD')
											{
												?>
												<a href="">hhh</a>
											<?php } else {?>
											<a href="">hhh</a>
											<?php }?>
											
		<div class="row mb-4">
					<?php
										$qrymetaltype = "SELECT * FROM product_type order by ptid asc";
										$exqrymetaltype = custom_my_sql_query($GLOBALS['con'], $qrymetaltype) or die(custom_my_sql_error($GLOBALS['con']));
										?>	
						<div class="col-md-4">
							<div class="input medium " id="stone_type_label">
								<label for="input1" class="col-form-label">Select Product Type <span class='star'>*</span></label>
								<div class="input-group" id="product_type_label">
									<select name="product_type" id="product_type" class="form-select" required="" onchange="manangeCompeteRingSection(this);">
										<option value="">Select Product Type</option>	
										<?php while($metalArray = custom_my_sql_fetch_assoc($exqrymetaltype)){?>
													<option value="<?php echo $metalArray['ptid']?>" <?php if($metalArray['ptid'] == $productResult['PtId']){?> selected="selected" <?php }?>><?php echo $metalArray['ProductType'];?></option>      
												<?php } ?>
									</select>
									<div class="invalid-feedback">This field is required.</div>
								</div>
							</div>
						</div>
					</div>
																	