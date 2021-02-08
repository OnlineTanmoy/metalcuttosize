/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'jquery',
    'mage/smart-keyboard-handler',
    'mage/mage',
    'mage/ie-class-fixer',
    'domReady!'
], function($, keyboardHandler) {
    'use strict';

    if ($('body').hasClass('checkout-cart-index')) {
        if ($('#co-shipping-method-form .fieldset.rates').length > 0 &&
            $('#co-shipping-method-form .fieldset.rates :checked').length === 0
        ) {
            $('#block-shipping').on('collapsiblecreate', function() {
                $('#block-shipping').collapsible('forceActivate');
            });
        }
    }

    $('.cart-summary').mage('sticky', {
        container: '#maincontent'
    });

    $('.panel.header > .header.links').clone().appendTo('#store\\.links');

  

    $(document).ready(function() {

        console.log(" load first ");


        setTimeout(function() {
            console.log(" ajaxcomplete  1 ");
			
					 $( ".file" ).insertAfter( "#advancedoption" );


            $(document).on('change', 'body .cutouts  input[type=checkbox]', function() {
				if ($("body .cutouts ").parent().parent().hasClass("cutoutsshape")){ }else { $("body .cutouts ").parent().parent().addClass('cutoutsshape'); }
				if ($("body .holes ").parent().parent().hasClass("holesshape")){ }else { $("body .holes ").parent().parent().addClass('holesshape'); }

				
                var index = $(".cutouts  input[type=checkbox]").index(this);
                if ($(this).prop("checked") == true) {
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').find('.product-color-swatches img ').css("opacity", "0.5");
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').css("cursor", "not-allowed");
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').css("pointer-events", " none");

                    $(" .holes input[type=checkbox]:eq(" + index + ")").attr("disabled", "disabled");
                } else {
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').find('.product-color-swatches img ').css("opacity", "1");
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').css("cursor", "pointer");
                    $(" .holes input[type=checkbox]:eq(" + index + ")").closest('.cc').css("pointer-events", " unset");

                    $(" .holes input[type=checkbox]:eq(" + index + ")").removeAttr("disabled");
                }
                var check1 = $('body .cutouts').find('input[type=checkbox]:checked').length;
                if (check1 == 0)
                    $('body .cutoutsize').find('input[type=text]').val("");
            });
			
			$(document).on('change', 'body .cutouts  input[type=checkbox]', function() {
				
				
				
                var index = $(".cutouts  input[type=checkbox]").index(this);
                if ( $(" .cutouts input[type=checkbox]:eq(0)").prop("checked") == true && index  == 0) {
                    $(" .topleftcutout ").parent().show();  $(" .topleftcutoutposition ").parent().show();   
                }  if ( $(" .cutouts input[type=checkbox]:eq(0)").prop("checked") != true && index  == 0) {  $(" .topleftcutout ").parent().hide(); $(" .topleftcutoutposition ").parent().hide();   }
				 if ($(" .cutouts input[type=checkbox]:eq(1)").prop("checked") == true && index  == 1) {
                    $(" .toprightcutout  ").parent().show();  $(" .toprightcutoutposition  ").parent().show();   
                } if ($(" .cutouts input[type=checkbox]:eq(1)").prop("checked") != true && index  == 1) {  $(" .toprightcutout  ").parent().hide(); $(" .toprightcutoutposition  ").parent().hide();   }
				 if ($(" .cutouts input[type=checkbox]:eq(2)").prop("checked") == true && index  == 2) {
                    $(" .bottomleftcutout  ").parent().show();  $(" .bottomleftcutoutposition  ").parent().show();   
                }  if ($(" .cutouts input[type=checkbox]:eq(2)").prop("checked") != true && index  == 2) {  $(" .bottomleftcutout  ").parent().hide(); $(" .bottomleftcutoutposition  ").parent().hide();   }
				 if ($(" .cutouts input[type=checkbox]:eq(3)").prop("checked") == true && index  == 3) {
                    $(" .bottomrightcutout  ").parent().show();  $(" .bottomrightcutoutposition  ").parent().show();   
                }  if ($(" .cutouts input[type=checkbox]:eq(3)").prop("checked") != true && index  == 3){  $(" .bottomrightcutout  ").parent().hide(); $(" .bottomrightcutoutposition  ").parent().hide();   }
				 if ($(" .cutouts input[type=checkbox]:eq(4)").prop("checked") == true && index  == 4) {
                    $(" .centercutout  ").parent().show();  $(" .centercutoutposition  ").parent().show();   
                } if ($(" .cutouts input[type=checkbox]:eq(4)").prop("checked") != true && index  == 4) {  $(" .centercutout  ").parent().hide(); $(" .centercutoutposition  ").parent().hide();   }				
             
            });			
			
			

            $(document).on('change', 'body #qty1', function() {
                $('body #qty').val($('body #qty1').val());
            });
			
			  setTimeout(function() {
                         //   $("body input[type='text']").parent().parent().addClass('textbox');
							$("body .cutoutsize").parent().addClass('textbox');
							$("body .dfec").parent().addClass('textbox');
							$("body .holesize").parent().addClass('textbox');
							$("body .dfeh").parent().addClass('textbox');
							  $("body .length_b").parent().addClass('textbox');
                            $("body .width_a").parent().addClass('textbox');
							$("body .position").parent().css('display','none');//.hide();
							$("body .cutout").parent().css('display','none');//.hide();
							$("body .hole").parent().css('display','none');//.hide();

                        }, 500);

            $(document).on('change', 'body .holes  input[type=checkbox]', function() {
								if ($("body .cutouts ").parent().parent().hasClass("cutoutsshape")){ }else { $("body .cutouts ").parent().parent().addClass('cutoutsshape'); }

				//$("body .holes ").parent().parent().addClass('holesshape');
				if ($("body .holes ").parent().parent().hasClass("holesshape")){ }else { $("body .holes ").parent().parent().addClass('holesshape'); }

                var index = $(".holes  input[type=checkbox]").index(this);

                if ($(this).prop("checked") == true) {
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').find('.product-color-swatches img ').css("opacity", "0.5");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').css("cursor", "not-allowed");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').css("pointer-events", " none");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").attr("disabled", "disabled");
                } else {
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').find('.product-color-swatches img ').css("opacity", "1");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').css("cursor", "pointer");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").closest('.cc').css("pointer-events", " unset");
                    $(" .cutouts input[type=checkbox]:eq(" + index + ")").removeAttr("disabled");
                }
                var check2 = $('body .holes').find('input[type=checkbox]:checked').length;
                if (check2 == 0)
                    $('body .holesize').find('input[type=text]').val("");

            });
			$(document).on('change', 'body .holes  input[type=checkbox]', function() {
                var index = $(".holes  input[type=checkbox]").index(this);
                if ( $(" .holes input[type=checkbox]:eq(0)").prop("checked") == true && index  == 0) {
                    $(" .toplefthole  ").parent().css('display','inline-grid');  $(" .topleftholeposition  ").parent().css('display','inline-grid'); 
                } if ( $(" .holes input[type=checkbox]:eq(0)").prop("checked") != true && index  == 0) {  $(" .toplefthole  ").parent().css('display','none'); $(" .topleftholeposition  ").parent().css('display','none');   }
				 if ($(" .holes input[type=checkbox]:eq(1)").prop("checked") == true && index  == 1) {
                    $(" .toprighthole   ").parent().css('display','inline-grid');  $(" .toprightholeposition  ").parent().css('display','inline-grid');   
                } if ($(" .holes input[type=checkbox]:eq(1)").prop("checked") != true && index  == 1) {  $(" .toprighthole   ").parent().css('display','none'); $(" .toprightholeposition  ").parent().css('display','none');   }
				 if ($(" .holes input[type=checkbox]:eq(2)").prop("checked") == true && index  == 2) {
                    $(" .bottomlefthole   ").parent().css('display','inline-grid');  $(" .bottomleftholeposition   ").parent().css('display','inline-grid');;   
                }if ($(" .holes input[type=checkbox]:eq(2)").prop("checked") != true && index  == 2)  {  $(" .bottomlefthole   ").parent().css('display','none'); $(" .bottomleftholeposition   ").parent().css('display','none');  }
				 if ($(" .holes input[type=checkbox]:eq(3)").prop("checked") == true && index  == 3) {
                    $(" .bottomrighthole   ").parent().css('display','inline-grid');  $(" .bottomrightholeposition   ").parent().css('display','inline-grid');  
                }  if ($(" .holes input[type=checkbox]:eq(3)").prop("checked") != true && index  == 3) {  $(" .bottomrighthole   ").parent().css('display','none'); $(" .bottomrightholeposition   ").parent().css('display','none');   }
				 if ($(" .holes input[type=checkbox]:eq(4)").prop("checked") == true && index  == 4) {
                    $(" .centerhole   ").parent().css('display','inline-grid');  $(" .centerholepoition   ").parent().css('display','inline-grid');  
                 } if ($(" .holes input[type=checkbox]:eq(4)").prop("checked") != true && index  == 4) {  $(" .centerhole   ").parent().css('display','none'); $(" .centerholepoition   ").parent().css('display','none');   }				
             
            });
            $(document).on('change', 'body .cutoutsize  input[type=text]', function() {
                if ($('body .cutoutsize input ').length && $('body .cutoutsize input ').val().length !== 0) {
                    if ($('body .cutoutsize input ').val() != "" && $('body .cutoutsize input ').val() != "undefined") //>= 5 &&  $('body .cutoutsize input ').val() <= 25
                    {
                        //isvalid = true;
                    } else {
                        jQuery(this).val("");
                    //    jQuery(this).parent().parent().append('<p class="mage-error">Cutout size should not be empty</p>');
                      //  setTimeout(function() {
                           // jQuery('.mage-error').remove();
                      //  }, 7000);
                    }
                }
            });
            $(document).on('change', 'body .hole input[type=text]', function() {
                if ( $(this).length &&  $(this).val().length !== 0) {
                    if ( $(this).val() >= 5 &&  $(this).val() <= 25) {
                    } else {
                        $(this).val("");
                       if($(this).parent().parent().find('.mage-error').length === 0) {   $(this).parent().parent().append('<p class="mage-error">Hole size should be between 5 and 25</p>');  }                   
                    }
                }
            });

			$(document).on('change', 'body .cutout input[type=text]', function() {
                if ( $(this).length &&  $(this).val().length !== 0) {
                     if (  $(this).val().length !== 0){ //if ( $(this).val() >= 5 &&  $(this).val() <= 25) {
                    } else {
                        $(this).val("");
                       if($(this).parent().parent().find('.mage-error').length === 0) {   $(this).parent().parent().append('<p class="mage-error">Hole size should be between 5 and 25</p>');  }                   
                    }
                }
            });
			
			$(document).on('change', 'body .position  input[type=text]', function() {
                if ( $(this).length &&  $(this).val().length !== 0) {
                    if ( $(this).val() >= 5) {
                    } else {
                        $(this).val("");
                        if($(this).parent().parent().find('.mage-error').length === 0) { $(this).parent().parent().append('<p class="mage-error">Distance from edge size greater than 5</p>'); }
                  
                    }
                }
            });
			
			/* jQuery("body #product-options-wrapper .position").each(function() {
				
				    $(this).find('input[type=text]').change(function () {
                       if ( $(this).length &&  $(this).val().length !== 0) {
							if ( $(this).val() >= 5) {
							} else {
								$(this).val("");
								$(this).parent().parent().append('<p class="mage-error">Distance from edge size greater than 5</p>');
						  
							}
						}
                    });
				
			}); */




            $(document).on('change', 'body .length_b  input[type=text]', function() {
                if ($('body .length_b input ').length && $('body .length_b input ').val().length !== 0) {

                    //isvalid = true;
                } else {
                    // isvalid = false;
                    $("body .length_b ").parent().append('<p class="mage-error">Please enter length</p>');
                  //  setTimeout(function() {
                     //   jQuery('.mage-error').remove();
                   // }, 7000);
                }
            });
            $(document).on('change', 'body .width_a  input[type=text]', function() {
                if ($('body .width_a input ').length && $('body .width_a input ').val().length !== 0) {

                    // isvalid = true;
                } else {
                    // isvalid = false;
                    $("body .width_a ").parent().append('<p class="mage-error">Please enter length</p>');
                   // setTimeout(function() {
                     //   jQuery('.mage-error').remove();
                   // }, 7000);
                }
            });
            $(document).on('change', 'body .angleb  input[type=text]', function() {
                if ($('body .angleb input ').length && $('body .angleb input ').val() >= 0 && $('body .angleb input ').val() <= 90) {

                    // isvalid = true;
                } else {
                    jQuery(this).val("");

                    // isvalid = false;
                   $("body .angleb ").parent().append('<p class="mage-error">Please enter angle between 0 to 90</p>');
                  //  setTimeout(function() {
                      //  jQuery('.mage-error').remove();
                   // }, 7000);
                }
            });
            $(document).on('change', 'body .anglec  input[type=text]', function() {
                if ($('body .anglec input ').length && $('body .anglec input ').val() >= 0 && $('body .anglec input ').val() <= 90) {

                    // isvalid = true;
                } else {
                    jQuery(this).val("");

                    // isvalid = false;
                   $('body .anglec  ').parent().append('<p class="mage-error">Please enter angle between 0 to 90</p>');
                  //  setTimeout(function() {
                      //  jQuery('.mage-error').remove();
                   // }, 7000);
                }
            });

            $(document).on('change', 'body .diameter  input[type=text]', function() {
                if ($('body .diameter input ').length && $('body .diameter input ').val().length !== 0) {

                    // isvalid = true;
                } else {
                    // isvalid = false;
                    $('body .diameter ').parent().append('<p class="mage-error">Please enter length</p>');
                   // setTimeout(function() {
                       // jQuery('.mage-error').remove();
                   // }, 7000);
                }
            });

            if ($("body").hasClass("page-product-advanced-option")) {

              //  if ($("body .advanced-product-option").find('.field').length !== 0) {




                    $(document).on('click', ' body .swatch-option.text ', function() {
                        $('.product-info-price').find('span.price').hide();
                        $('.box-tocart').hide();
                        $('.price-box').find('span.price').hide();
                    });

                    $("body").addClass("advanced-option-page");


                    $(document).on('change', 'body .advanced-product-option  input ,body .advanced-product-option  textarea ', function() {
                        console.log(" you clicke input 1111 ");
						 setTimeout(function() {
                           // $("body input[type='text']").parent().parent().addClass('textbox');
							$("body .cutoutsize").parent().addClass('textbox');
							$("body .dfec").parent().addClass('textbox');
							$("body .holesize").parent().addClass('textbox');
							$("body .dfeh").parent().addClass('textbox');

                        }, 300);

                    });
                    $(document).on('change', 'body .advanced-product-option  input ,body .advanced-product-option  textarea ', function() {
                        console.log(" you clicke input ");
                        setTimeout(function() {
                            $("body .anglec").parent().find(".mm").css("display", "none");
                            $("body .angleb").parent().find(".mm").css("display", "none");

                        }, 100);

                        //hide label of teext feilds
                        $("body .advanced-product-option .options-list  ").each(function() {
                            $(this).find('.field').each(function() {
                                if ($(this).find('.product-color-swatches').length > 0) {
                                    $(this).find('label').hide();
                                }
                            });

                            $(this).find('.choice').each(function() {
                                if ($(this).parent().find('.product-color-swatches').length > 0) {
                                    $(this).find('label').hide();
                                }
                            });

                        });
                        // end

                        var xt_sum = '<div id="loading-image" ></div>';
                        $(" #summary").html(xt_sum);
                        $(".sums").css('visibility', 'visible');
                        var preview = ''
                        var swatch_label = jQuery('.swatch-attribute-label').text();
                        var swatch_value = jQuery('.swatch-attribute-selected-option').text();
                        if (swatch_value.length > 0) {
                            preview = preview + " <p> <span> " + swatch_label + " </span> : " + swatch_value + "</p>";
                        }
                        $(".advanced-product-option > .field").each(function() {
                            var label = $(this).find('label > span').first().text();
                            var userval = '';
                            $(this).find('input').each(function() {
                                var type = $(this).attr('type');
                                if (type == "text") {
                                    if ($(this).val().length > 0) {
                                        userval = $(this).val();
                                    }

                                }
                                if (type == "checkbox" || type == "radio") {
                                    //if($(this).parent().find('input[type=checkbox]:checked').length > 0)
                                    if ($(this).prop("checked") == true) {
                                        var lbl = $(this).parent().find('label').text();
                                        if (lbl.length > 0) {
                                            lbl = lbl.replace("Square", "");
                                            lbl = lbl.replace("Rectangle", "");
                                            lbl = lbl.replace("Triangle", "");
                                            lbl = lbl.replace("Circle", "");
                                            if (userval.length > 0) {

                                                userval = userval + "," + lbl;
                                            } else {
                                                userval = lbl;
                                            }
                                        } else {
                                            userval = lbl;
                                        }
                                        var ttl = $(this).closest('options-list').parent().parent().find('label').text();
                                    }
                                }
                            });
                            $(this).find('textarea').each(function() {
                                var label = $(this).find('label > span').first().text();
                                if ($.trim($(this).val()).length > 0) {
                                    userval = $(this).val();
                                }
                            });
                            if (label.length > 0 && userval.length > 0) {
                                if (label.toLowerCase().indexOf("size") >= 0) {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + " mm </p>";
                                } else if (label.toLowerCase().indexOf("length") >= 0) {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + " mm </p>";
                                } else if (label.toLowerCase().indexOf("edge") >= 0) {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + " mm </p>";
                                } else if (label.toLowerCase().indexOf("width") >= 0) {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + " mm </p>";
                                } else if (label.toLowerCase().indexOf("angle") >= 0) {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + " ° </p>";
                                } else if (label.toLowerCase().indexOf("square") >= 0) {
                                    preview = preview + " <p> <span> " + label.replace("SQUARE", "") + " </span> : " + userval + "  </p>";
                                } else if (label.toLowerCase().indexOf("rectangle") >= 0) {
                                    preview = preview + " <p> <span> " + label.replace("RECTANGLE", "") + " </span> : " + userval + " </p>";
                                } else if (label.toLowerCase().indexOf("triangle") >= 0) {
                                    preview = preview + " <p> <span> " + label.replace("TRIANGLE", "") + " </span> : " + userval + "  </p>";
                                } else if (label.toLowerCase().indexOf("circle") >= 0) {
                                    preview = preview + " <p> <span> " + label.replace("CIRCLE ", "") + " </span> : " + userval + " </p>";
                                } else {
                                    preview = preview + " <p> <span> " + label + " </span> : " + userval + "  </p>";
                                }
                            }

                            // console.log("label = > " +capitalize(label)+" values =>"+userval);

                        });
                        var summary = preview;
                        $("#summary").html(summary);
                    });

                    $(document).on('click', 'body .swatch-option', function() {
                        $(".sums").css('visibility', 'visible');
                    });


                    $(document).on('click', 'body .swatch-option', function() {

                        // $(' .swatch-option ').on('click', function() {

                        var xt_sum = '<div id="loading-image" ></div>';
                        $("#summary").html(xt_sum);
                        $(".sums").css('visibility', 'visible'); //console.log(" ajaxcomplete  1  2");
                        var preview = ''
                        var swatch_label = jQuery('.swatch-attribute-label').text();
                        var swatch_value = jQuery('.swatch-attribute-selected-option').text();
                        if (swatch_value.length > 0) {
                            preview = preview + " <p> <span> " + swatch_label + " </span> : " + swatch_value + "</p>";
                        }
                        $(".advanced-product-option > .field").each(function() {
                            var label = $(this).find('label > span').first().text();
                            var userval = '';
                            $(this).find('input').each(function() {
                                var type = $(this).attr('type');
                                if (type == "text") {
                                    if ($(this).val().length > 0) {
                                        userval = $(this).val();
                                    }
                                }
                                if (type == "checkbox" || type == "radio") { //if($(this).parent().find('input[type=checkbox]:checked').length > 0)
                                    if ($(this).prop("checked") == true) {
                                        var lbl = $(this).parent().find('label').text();
                                        if (lbl.length > 0) {
                                            if (userval.length > 0) {
                                                userval = userval + "," + lbl;
                                            } else {
                                                userval = lbl;
                                            }
                                        } else {
                                            userval = lbl;
                                        }
                                        var ttl = $(this).closest('options-list').parent().parent().find('label').text();
                                    }
                                }
                            });
                            $(this).find('textarea').each(function() {
                                var label = $(this).find('label > span').first().text();
                                if ($(this).val().length > 0) {
                                    userval = $(this).val();
                                }
                            });

                            if (label.length > 0) {
                                preview = preview + " <p> <span> " + label + " </span> : " + userval + "</p>";
                            }
                            //  console.log("label = > " +capitalize(label)+" values =>"+userval);

                        });
                        var summary = preview;
                        $("#summary").html(summary);
                    });

                    function capitalize(str) {
                        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
                    }


              //  }


                // add border on product swatches of checbox list
                $(document).on('change', 'body .advanced-product-option input[type=radio]', function() {
                    $(' body .options-list.nested img').css('border', 'none'); //add a class to be more specific
                    $(this).parent().find('img').css('border', 'solid 1px orange');
                });

                $(document).on('click', 'body .options-list.nested .cc .product-color-swatches', function() {
                    $(this).parent().find('input[type="checkbox"]').click();
                });


                $(document).on('click', 'body .options-list.nested .cc .product-color-swatches ', function() {
                    if ($(this).closest('.cc').find('input[type=checkbox]:checked').length > 0) {
                        $(this).find('.swatch-illusion img').css('border', 'solid 1px red');
                    } else {
                        $(this).find('.swatch-illusion img').css('border', 'none');
                    }
                });


            }

				$('body').addClass("advancedpro");

        }, 4500);


        setTimeout(function() {
            if ($("body").hasClass("page-product-advanced-option")) {


                setTimeout(function() {
                    $("body .anglec").parent().find(".mm").css("display", "none");
                    $("body .angleb").parent().find(".mm").css("display", "none");

                }, 500);

                $("body .advanced-product-option .shape .product-color-swatches:first").trigger('click');

                $('body .width_a').parent('.field').css('border', 'none');
                $('body .diameter').parent('.field').css('border', 'none');
                $('body .length_b').parent('.field').css('border', 'none');
                $('body .height_h').parent('.field').css('border', 'none');
                $('body .base_c').parent('.field').css('border', 'none');


               // if ($("body .advanced-product-option").find('.field').length !== 0) {

                    var shape = "";

                    $(document).on('change', 'body .diameter input ', function() {

                        $("body #width").text($(this).val() + "mm");
                        $("body #length").text($(this).val() + "mm");
                    });

                    $(document).on('change', 'body .anglec input ', function() {
                        if ($(this).val().length && $(this).val() >= 0 && $(this).val() <= 90) {
                            $("body #anglec").text($(this).val() + "°");
                        }
                    });

                    $(document).on('change', 'body .angleb input ', function() {
                        $("body #length").text($(this).val() + "°");

                    });
                    $(document).on('change', 'body .length_b input ', function() {
                        $("body #length").text($(this).val() + "mm");

                    });
                    $(document).on('change', 'body .cutlength input ', function() {
                        $("body #cutlength").text($(this).val() + "mm");


                    });

                    $(document).on('change', 'body .width_a input ', function() {
                        $("body #width").text($(this).val() + "mm");
                        $("body .shape  input").each(function() {
                            if ($(this).prop("checked") == true) {
                                shape = $(this).parent().find('label').text();
                            }
                        });
                        if ($.trim(shape) == "SQUARE") {
                            $("body #length").text($(this).val() + "mm");
                        }
                    });




                    $("body .cutoutsize").parent().addClass('cts');

                    $(document).on('click', ' body .typeofcut .advanced-product-row-field  ', function() {



                        var imgsrc = $(this).parent().find('.color_swatch_box img').attr('src');
                        var canvas = document.getElementById("canvas");
                        if (canvas.getContext) {
                            var ctx = canvas.getContext("2d");
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            var base_image = new Image();
                            base_image.src = imgsrc; //'https://m2.metalcuttosize.co.uk/pub/media/theme/triangle.png';
                            var imageWidth = 200;
                            var imageHeight = 95;
                            base_image.onload = function() { //ctx.drawImage(base_image,40, 50); 
                                ctx.drawImage(base_image, 20, 50, imageWidth, imageHeight);
                            }
                        }
                        setTimeout(function() {
                            $("body .anglec").parent().find(".mm").css("display", "none");
                            $("body .angleb").parent().find(".mm").css("display", "none");

                        }, 300);
						

                        $("body #anglec").text("");
                        $("body #cutlength").text("");
                        $("body #length").text("");

                    });
                    setTimeout(function() {
                        jQuery("body .holes").parent().find('label:first').html("<span>HOLES </span>");
                        jQuery("body .cutouts").parent().find('label:first').html("<span> CUTOUTS </span>");

                    }, 100);
                    $(document).on('click, change', ' body .cutouts  .advanced-product-row-field , body .holes  .advanced-product-row-field', function() {
						setTimeout(function() {
							if($('body .hole input ').length) {  var checkedNum = $('body input[name="aop[20][]"]:checked').length;
								if (checkedNum) {   
									   $('body .hole').each(function() {
											if(  $(this).find('input[type=text] ').val().length !== 0){  }
											else { if($(this).parent().find('.mage-error').length === 0) { 	$(this).parent().append('<p class="mage-error">Please enter hole size</p>'); } }	 							   
									   });

							} }
						   
							if($('body .cutout input ').length) { var checkedNum = $('body input[name="aop[19][]"]:checked').length;
								if (checkedNum) { 
									 $('body .cutout').each(function() {
											if(  $(this).find('input[type=text] ').val().length !== 0){  }
											else { if($(this).parent().find('.mage-error').length === 0) { $(this).parent().append('<p class="mage-error">Please enter cutout size</p>'); }  }								   
									   });
							
							} }
							
							if($('body .position input ').length) { var checkedNum = $('body input[name="aop[19][]"]:checked').length;
								if (checkedNum) {
								 $('body .position').each(function() {
											if($(this).find('input[type=text] ').val().length !== 0){ }
											else { if($(this).parent().find('.mage-error').length === 0) { $(this).parent().append('<p class="mage-error">Please enter position </p>');} }								   
									   });
								
							} }
						}, 500);
					});
                    $(document).on('click', ' body .shape .advanced-product-row-field ', function() {

                        $("body #width").text("");
                        $("body #length").text("");
                        var shape = $(this).parent().find('label').text();

                        setTimeout(function() {
                            jQuery("body .holes").parent().find('label:first').html("<span>HOLES </span>");
                            jQuery("body .cutouts").parent().find('label:first').html("<span> CUTOUTS </span>");

                        }, 300);
                        setTimeout(function() {
                            $("body input[type='text']").parent().parent().addClass('textbox');
							$("body .cutoutsize").parent().addClass('textbox');
								$("body .hole").parent().addClass('textbox');
							$("body .cutout").parent().addClass('textbox');
							$("body .position").parent().addClass('textbox');
							  $("body .length_b").parent().addClass('textbox');
                           // $("body .width_a").parent().addClass('textbox1');
							
						//	//  $("body .cutouts ").parent().addClass('shapedata');
                          //  $("body .holes").parent().addClass('shapedata');
                          //  $("body .cutout").parent().addClass('Abc');
							// $("body").addClass('shapedesign');
						 	$("body ").addClass('areabasedproduct');
							$("body .advanced-product-option").addClass('shapeproduct  ' +$.trim(shape));  
							
							$("body .comment").parent().addClass('cmt');
							$("body .cutout").parent().addClass('cuts');
							$("body .position").parent().addClass('pts');
							$("body .hole").parent().addClass('huts');
							
							//$("body .cutouts ").parent().parent().addClass('cutoutsshape');$("body .holes ").parent().parent().addClass('holesshape');
						//	
						//	$("body .advanced-product-option").addClass('shapeproduct  ' +$.trim(shape));
							

                        }, 500);

                        if ($.trim(shape) == "CIRCLE") {
                            $("#width").css("top", "220px");
                            $("#width").css("left", "100px");
                        }
                        if ($.trim(shape) == "TRIANGLE") {
                            $("#width").css("top", "220px");
                            $("#width").css("left", "100px");
                        }
                        if ($.trim(shape) == "SQUARE") {
                            $("#width").css("top", "220px");
                            $("#width").css("left", "120px");
                        }
                        if ($.trim(shape) == "RECTANGLE") {
                            $("#width").css("top", "220px");
                            $("#width").css("left", "150px");
                        }



                        setTimeout(function() {

                            $("body .cutoutsize").parent().addClass('cts');
                            $("body .length_b").parent().addClass('textbox');
                            $("body .width_a").parent().addClass('textbox');
							$("body .cutoutsize").parent().addClass('textbox');
							$("body .hole").parent().addClass('textbox');
							$("body .cutout").parent().addClass('textbox');
							$("body .position").parent().addClass('textbox');
							//$("body .position").parent().hide();
							//$("body .cutout").parent().hide();
							//$("body .hole").parent().hide();
								$("body .position").parent().css('display','none');//.hide();
							$("body .cutout").parent().css('display','none');//.hide();
							$("body .hole").parent().css('display','none');//.hide();

							
							                         //   $("body input[type='text']").parent().parent().addClass('textbox');



                        }, 700);



                        $("body .advanced-product-option .options-list  ").each(function() {
                            $(this).find('.field').each(function() {
                                if ($(this).find('.product-color-swatches').length > 0) {
                                    $(this).find('label').hide();
                                }
                            });

                            $(this).find('.choice').each(function() {
                                if ($(this).parent().find('.product-color-swatches').length > 0) {
                                    $(this).find('label').hide();
                                }
                            });
                            $(document).on('change', 'body .options-list.nested .cc .product-color-swatches ', function() {

                                if ($(this).parent().find('input[type=checkbox]:checked').length > 0) {
                                    $(this).find('.swatch-illusion img').css('border', 'none'); //add a class to be more specific
                                } else {
                                    $(this).find('.swatch-illusion img').css('border', 'solid 1px red');
                                }
                            });
                            $(document).on('change', 'body .options-list.nested .cc input[type=checkbox] ', function() {
                                if ($(this).parent().find('input[type=checkbox]:checked').length > 0) {
                                    $(this).find('.swatch-illusion img').css('border', 'none'); //add a class to be more specific
                                } else {
                                    $(this).find('.swatch-illusion img').css('border', 'solid 1px red');
                                }
                            });

                        });

                        $(document).on('click', ' .options-list.nested .cc .product-color-swatches ', function() {


                            if ($(this).parent().find('input[type=checkbox]:checked').length == 0) {
                                $(this).find('.swatch-illusion img').css('border', 'none'); //add a class to be more specific
                            } else {
                                $(this).find('.swatch-illusion img').css('border', 'solid 1px red');
                            }
                            var shape = "";
                            $("body .shape  input").each(function() {
                                if ($(this).prop("checked") == true) {
                                    shape = $(this).parent().find('label').text();
                                }
                            });
							
							    setTimeout(function() {

                            $("body .cutoutsize").parent().addClass('cts');
                            $("body .length_b").parent().addClass('textbox');
                            $("body .width_a").parent().addClass('textbox');
							$("body .cutoutsize").parent().addClass('textbox');
							$("body .dfec").parent().addClass('textbox');
							$("body .holesize").parent().addClass('textbox');
							$("body .dfeh").parent().addClass('textbox');
					

							                           // $("body input[type='text']").parent().parent().addClass('textbox');



                        }, 500);

                            if ($.trim(shape) == "CIRCLE") {
                                if ($(this).parent().find('input[type=checkbox]:checked').length == 0) {
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Top hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 30);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Bottom hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 160);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Left hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 90);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Center hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 90);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Right hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 180, 90);
                                            }
                                        }
                                    }
                                } else {
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Top hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 30);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Bottom hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 160);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Left hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 90);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Center hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 90);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Circle Right hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 180, 90);
                                            }
                                        }
                                    }
                                }
                            }
                            if ($.trim(shape) == "TRIANGLE") {
                                if ($(this).parent().find('input[type=checkbox]:checked').length == 0) {
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Top Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 119, 70);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 75, 150);
                                            }
                                        }
                                    }

                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Right Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 160, 150);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Center Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 110);
                                            }
                                        }
                                    }
                                } else {
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Top Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 119, 70);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 75, 150);
                                            }
                                        }
                                    }

                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Right Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 160, 150);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Triangle Center Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 110);
                                            }
                                        }
                                    }
                                }
                            }
                            if ($.trim(shape) == "SQUARE") {
                                if ($(this).parent().find('input[type=checkbox]:checked').length == 0) {
                                    //holes
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Right Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "grey"; ctx.fillRect(170, 60, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 170, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Left Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "grey";   ctx.fillRect(60, 170, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 170);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Right  Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "grey"; ctx.fillRect(170, 170, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 170, 170);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Center Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "grey"; ctx.fillRect(115, 110, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 115, 110);
                                            }
                                        }
                                    }

                                    //cutouts
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Left Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(60, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Right Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(170, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Left Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(60, 170, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Right  Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(170, 170, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Center Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(115, 110, 20, 20);
                                        }
                                    }

                                } else {

                                    //holes
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "white";ctx.fillRect(60, 60, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Right Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "white"; ctx.fillRect(170, 60, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 170, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Left Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "white";   ctx.fillRect(60, 170, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 60, 170);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Right  Hole ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "white"; ctx.fillRect(170, 170, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 170, 170);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Center Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d"); //ctx.fillStyle = "white"; ctx.fillRect(115, 110, 20, 20);
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 115, 110);
                                            }
                                        }
                                    }
                                    //cutouts
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Left Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(60, 60, 20, 20);
                                            //ctx.arc(60, 60, 5, 0, 2 * Math.PI);ctx.fillStyle = "white";ctx.fill();
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Top Right Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(170, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Left Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(60, 170, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Bottom Right  Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(170, 170, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Square Center Cutout") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(115, 110, 20, 20);
                                        }
                                    }
                                }
                            }
                            if ($.trim(shape) == "RECTANGLE") {
                                if ($(this).parent().find('input[type=checkbox]:checked').length == 0) {

                                    //CUTOUTS
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Top Left") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(30, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Top Right") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(200, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom left ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(30, 140, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom Right") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(200, 140, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Center") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey";
                                            ctx.fillRect(120, 100, 20, 20);
                                        }
                                    }

                                    //HOLES
                                    if ($(this).parent().find('img').attr('tittle') == "Top Left Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey"; //ctx.fillRect(60, 60, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 30, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Top Right Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey"; //ctx.fillRect(210, 60, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 200, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey"; // ctx.fillRect(60, 140, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 30, 140);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Bottom Right Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey"; //ctx.fillRect(210, 140, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 200, 140);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Center Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "grey"; //ctx.fillRect(140, 100, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid grey.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 100);
                                            }
                                        }
                                    }
                                } else {
                                    //CUTOUTS
                                    if ($(this).find('img').attr('tittle') == "Rectangle Top Left") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(30, 60, 20, 20);
                                            //ctx.arc(60, 60, 5, 0, 2 * Math.PI);ctx.fillStyle = "white";ctx.fill();
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Top Right") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(200, 60, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom left ") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(30, 140, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom Right") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(200, 140, 20, 20);
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Center") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white";
                                            ctx.fillRect(120, 100, 20, 20);
                                        }
                                    }
                                    //HOLES
                                    if ($(this).parent().find('img').attr('tittle') == "Top Left Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white"; //ctx.fillRect(60, 60, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 30, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Top Right Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white"; //ctx.fillRect(210, 60, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 200, 60);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Rectangle Bottom Left Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white"; // ctx.fillRect(60, 140, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 30, 140);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Bottom Right Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white"; //ctx.fillRect(210, 140, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 200, 140);
                                            }
                                        }
                                    }
                                    if ($(this).parent().find('img').attr('tittle') == "Center Rectangle Hole") {
                                        var canvas = document.getElementById("canvas");
                                        if (canvas.getContext) {
                                            var ctx = canvas.getContext("2d");
                                            ctx.fillStyle = "white"; //ctx.fillRect(140, 100, 20, 20);
                                            var ctx = canvas.getContext("2d");
                                            var base_image = new Image();
                                            base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/circle-solid.png';
                                            base_image.onload = function() {
                                                ctx.drawImage(base_image, 120, 100);
                                            }
                                        }
                                    }
                                }
                            }


                        });
                        var shape1 = $(this).parent().find('label').text();

                        //End custom option code
                        if ($(this).parent().find(' img').attr('tittle') == "CIRCLE") {
                            var canvass = document.getElementById("canvas");
                            if (canvass.getContext) {
                                var ctx = canvass.getContext("2d");
                                ctx.clearRect(0, 0, canvass.width, canvass.height);

                                //define the colour of the circle
                                //  ctx.strokeStyle = "grey";
                                var centreX = 125;
                                var centreY = 100;
                                var radius = 75;

                                // convert start angle '0 degrees' to radians
                                var startAngle = 0 * Math.PI / 180;

                                //convert end angle '360 degrees' to radians
                                var endAngle = 360 * Math.PI / 180;

                                //define the circle
                                ctx.arc(centreX, centreY, radius, startAngle, endAngle, false);
                                ctx.fillStyle = "grey";
                                ctx.fill();
                                //draw the circle
                                //ctx.stroke();
                            }
                        }

                        if ($(this).parent().find('img').attr('tittle') == "SQUARE") {
                            var canvas = document.getElementById("canvas");
                            if (canvas.getContext) {
                                var ctx = canvas.getContext("2d");
                                ctx.clearRect(0, 0, canvas.width, canvas.height);

                                //define the colour of the square
                                ctx.fillStyle = "grey";

                                // Draw a square using the fillRect() method and fill it with the colour specified by the fillStyle attribute
                                //ctx.fillRect(200,50,100,100);
                                ctx.fillRect(50, 50, 150, 150);
                            }
                        }

                        if ($(this).parent().find('img').attr('tittle') == "TRIANGLE") {
                            var canvas = document.getElementById("canvas");
                            if (canvas.getContext) {
                                var ctx = canvas.getContext("2d");
                                ctx.clearRect(0, 0, canvas.width, canvas.height);
                                var base_image = new Image();
                                base_image.src = 'https://m2.metalcuttosize.co.uk/pub/media/theme/triangle.png';
                                var imageWidth = 125;
                                var imageHeight = 125;
                                base_image.onload = function() { //ctx.drawImage(base_image,40, 50); 
                                    ctx.drawImage(base_image, 60, 50, imageWidth, imageHeight); //ctx.drawImage(base_image, 40, 50, imageWidth, imageHeight); 
                                }



                            }
                        }

                        if ($(this).parent().find('img').attr('tittle') == "RECTANGLE") {
                            var canvas = document.getElementById("canvas");
                            if (canvas.getContext) {
                                var ctx = canvas.getContext("2d");
                                ctx.clearRect(0, 0, canvas.width, canvas.height);
                                //define the fill colour of the rectangle
                                ctx.fillStyle = "grey";
                                ctx.fillRect(25, 50, 200, 120); //ctx.fillRect(50,50,200,120);
                            }
                        }




                        $('body .width_a').parent('.field').css('border', 'none');
                        $('body .diameter').parent('.field').css('border', 'none');
                        $('body .length_b').parent('.field').css('border', 'none');
                        $('body .height_h').parent('.field').css('border', 'none');
                        $('body .base_c').parent('.field').css('border', 'none');


                    });




                //}
            }
        }, 4500);


    });




    $(document).ready(function() {
        $('.price-box').find('span.price').hide();
        $('.box-tocart').hide();

        $(document).on('change', ' body .advanced-product-option input ', function() {
            $('.product-info-price').find('span.price').hide();
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();
        });
        $('body .options-list  input').on('change', function() {
            var txt = jQuery(this).parent().find(".label span").text();
            var txt1 = jQuery(this).parent().find(".label ").text();
            $('.product-info-price').find('span.price').hide();
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();

            var pp = parseFloat(0); // var abc = 0;

            jQuery("body #product-options-wrapper input[type=radio]:checked").each(function() {

                if (this.value == "NaN") {
                    var abc = 0;
                }
                if (jQuery(this).attr('price') !== typeof undefined && jQuery(this).attr('price') !== false) {
                    var abc = parseFloat(jQuery(this).attr('price'));
                } else {
                    var abc = 0;
                }
                if (!$.isNumeric(abc)) {
                    abc = 0;
                }
                pp = pp + abc;
                $('body #custom_option_price_cal').val(pp);
            });

            var price_custom_option = $('body #custom_option_price_cal').val();

            var c_price = $('body #custom_price_cal').val();
            if (!$.isNumeric(c_price)) {
                c_price = 0;
            }

            $('span.price').text('-');
            $('span.price').show();
            var cc_price = (parseFloat)(c_price) + (parseFloat)(price_custom_option);
            $('span.price').text('£' + cc_price);

        });


        $('body #product-options-wrapper .field.required  input').on('change', function() {
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();
        });

        $('body #product-options-wrapper .field  input').on('change', function() {
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();
        });


        $('body #qty').on('change', function() {
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();
        });

        $('body #qty1').on('change', function() {
            $('.box-tocart').hide();
            $('.price-box').find('span.price').hide();
        });



    });

    keyboardHandler.apply();


});