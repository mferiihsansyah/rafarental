<?php echo validation_errors(); ?>
<div class="page-content">
<div class="page-body">
<div class="row">
<div class="widget-body">
<div>
    <form id="addform" action="<?php echo base_url();?>admin/bus/add_data" enctype="multipart/form-data"  method="post"
        data-bv-message="Data tidak Valid"
        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="form-group">
            <label for="namamobil">Nama Mobil</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Mobil"data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
        </div>
        <div class="form-group">
            <label for="deskripsimobil">Deskripsi Mobil</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Mobil">
        </div>
        <div class="form-group">
            <label for="deskripsimobil">Jumlah Mobil</label>
            <input type="number" class="form-control" name="stok" placeholder="Jumlah Mobil" data-bv-notempty="true" data-bv-notempty-message="Jumlah Mobil Tidak Boleh Kosong">
        </div>
        <div class="form-group">
            <label for="deskripsimobil">Biaya Sewa Mobil /Hari</label>
            <input type="number" class="form-control" name="biaya" placeholder="Biaya Sewa/Hari" data-bv-notempty="true" data-bv-notempty-message="Biaya Tidak Boleh Kosong">
        </div>
        <hr class="wide"/>
        <label>Tipe Mobil</label>
        <div class="row">
        <?php foreach ($tipe_mobil as $tampil){     
        ?>
            <div class="col-lg-2 col-sm-2 col-xs-2">
                <div class="control-group">
                    <div class="radio">
                        <label>
                            <input name="tipe_mobil" type="radio" class="colored-blue" value="<?php echo $tampil->name_cat;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">
                            <span class="text"> <?php echo $tampil->name_cat;?></span>
                        </label>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
        <hr class="wide"/>
        <label>Jumlah Kursi</label>
        <div class="row">
        <?php foreach ($kursi_mobil as $tampilkursi){     
        ?>
            <div class="col-lg-2 col-sm-2 col-xs-2">
                <div class="control-group">
                    <div class="radio">
                        <label>
                            <input name="jumlah_kursi" type="radio" class="colored-blue" value="<?php echo $tampilkursi->total_seat;?>" data-bv-notempty="true" data-bv-notempty-message="Nama Tidak Boleh Kosong">                           
                             <span class="text"> <?php echo $tampilkursi->total_seat;?></span>
                        </label>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
        <hr class="wide"/>
        <label>Gambar Mobil</label>
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-xs-2">
                <span class="file-input btn btn-block btn-default btn-file">
                    Browse <input type="file" name="image_mobil" data-bv-notempty="true" data-bv-notempty-message="Gambar Tidak Boleh Kosong">
                </span>
                <hr class="wide"/>
            </div>
        </div>
        <button type="submit" class="btn btn-blue">SIMPAN</button>
        <a href="javascript:window.history.go(-1);" class="btn btn-labeled btn-darkorange">
            <i class="btn-label glyphicon glyphicon-remove"></i>BATAL
        </a> 
    </form>
</div>
</div>
</div>
</div>
</div>
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