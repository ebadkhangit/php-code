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