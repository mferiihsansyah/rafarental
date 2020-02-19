<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 1.6.0
Purchase: https://wrapbootstrap.com/theme/beyondadmin-adminapp-angularjs-mvc-WB06R48S4
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->

<!-- Mirrored from beyondadmin-v1.6.0.s3-website-us-east-1.amazonaws.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2016 00:45:19 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $title_web .' | '. $page_web;?></title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?php echo base_url();?>assets/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo base_url();?>assets/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <form id="addform" action="<?php echo base_url();?>login/go_log" method="post"
            data-bv-message="Data tidak Valid"
            data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
            data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
            data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
            <div class="loginbox-title">SIGN IN</div>
            <div class="loginbox-social">
                <div class="social-title ">Jadilah Bagian dari Rafa Rental</div>
            </div>
            <div class="form-group">
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="Username" name="username" data-bv-notempty="true" data-bv-notempty-message="Username Tidak Boleh Kosong"/>
            </div>
            </div>
            <div class="form-group">
            <div class="loginbox-textbox">
                <input type="password" class="form-control" placeholder="Password" name="password" data-bv-notempty="true" data-bv-notempty-message="Password Tidak Boleh Kosong"/>
            </div>
            </div>
            <div class="loginbox-textbox">
                  <button type="submit" class="btn btn-blue">LOGIN</button>
            </div>
            
        </form>
        </div>
        <div class="logobox">
            <div class="loginbox-signup">
                <label>Belum punya akun? Silakan klik 
                <a href="<?php echo base_url();?>register">daftar</a></label>
            </div>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?php echo base_url();?>assets/assets/js/beyond.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/validation/bootstrapValidator.js"></script>
    <script>
        $(document).ready(function () {

            $("#addform").bootstrapValidator();

            $('#togglingForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                submitHandler: function (validator, form, submitButton) {
                    // Do nothing
                },
                fields: {
                    firstName: {
                        validators: {
                            notEmpty: {
                                message: 'The first name is required'
                            }
                        }
                    },
                    lastName: {
                        validators: {
                            notEmpty: {
                                message: 'The last name is required'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'The company name is required'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    job: {
                        validators: {
                            notEmpty: {
                                message: 'The job title is required'
                            }
                        }
                    },
                    department: {
                        validators: {
                            notEmpty: {
                                message: 'The department name is required'
                            }
                        }
                    },
                    mobilePhone: {
                        validators: {
                            notEmpty: {
                                message: 'The mobile phone number is required'
                            },
                            digits: {
                                message: 'The mobile phone number is not valid'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    homePhone: {
                        validators: {
                            digits: {
                                message: 'The home phone number is not valid'
                            }
                        }
                    },
                    officePhone: {
                        validators: {
                            digits: {
                                message: 'The office phone number is not valid'
                            }
                        }
                    }
                }
            })
            .find('button[data-toggle]')
            .on('click', function () {
                var $target = $($(this).attr('data-toggle'));
                // Show or hide the additional fields
                // They will or will not be validated based on their visibilities
                $target.toggle();
                if (!$target.is(':visible')) {
                    // Enable the submit buttons in case additional fields are not valid
                    $('#togglingForm').data('bootstrapValidator').disableSubmitButtons(false);
                }
            });


            $('#accountForm').bootstrapValidator({
                // Only disabled elements are excluded
                // The invisible elements belonging to inactive tabs must be validated
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                submitHandler: function (validator, form, submitButton) {
                    // Do nothing
                },
                fields: {
                    fullName: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'The company name is required'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'The address is required'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'The city is required'
                            }
                        }
                    }
                }
            });

            $('#html5Form').bootstrapValidator();
        });
    </script>

    
</body>
<!--Body Ends-->

<!-- Mirrored from beyondadmin-v1.6.0.s3-website-us-east-1.amazonaws.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2016 00:45:19 GMT -->
</html>
