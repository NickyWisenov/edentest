<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\frontend\MaterialAsset;
use app\assets\frontend\AutocompleteAsset;

MaterialAsset::register($this);
AutocompleteAsset::register($this);

$this->title = 'Eden Woolf - Register as Family';
?>

<!-- *****************Join-start****************** -->
<div class="new-register-total">
    <section class="prof-inner-bnr pad-top-55">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register as a Family</h2>

                    <!--                    <ul class="bred-cramb">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Join</a>
                                            </li>
                                        </ul>-->
                </div>
            </div>
        </div>
    </section>

    <section class="registration-body new-register-form">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body-main-top-1">
                    <div class="panel-body-main">
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'family_registration',
                                    'options' => ['role' => "form", 'class' => 'form', 'enctype' => 'multipart/form-data'],
                                    'enableClientValidation' => true
                                ])
                        ?>
                        <?= $form->field($model, 'type_id')->hiddenInput(['value' => "3"])->label(false); ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <!--<input id="display_name" type="text" class="validate">-->
                                <input type="text" id="usermaster-display_name" class="validate" name="UserMaster[display_name]" value="<?=($model->display_name!='')?$model->display_name:''?>">
                                <label for="usermaster-display_name">Display name</label>
<!--                                    <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                            <i class="fa fa-check" style="display: none; color: green;"></i>
                            <i class="fa fa-times" style="display: none; color: red;"></i>-->
                                <div class="help-block"><?= (isset($model->getErrors('display_name')[0]) && $model->getErrors('display_name')[0] != null) ? $model->getErrors('display_name')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="usermaster-first_name" class="validate" name="UserMaster[first_name]" aria-required="true" aria-invalid="true" value="<?=($model->first_name!='')?$model->first_name:''?>">
                                <label for="usermaster-first_name">First name</label>
                                <div class="help-block"><?= (isset($model->getErrors('first_name')[0]) && $model->getErrors('first_name')[0] != null) ? $model->getErrors('first_name')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="usermaster-last_name" class="validate" name="UserMaster[last_name]" aria-required="true" aria-invalid="true" value="<?=($model->last_name!='')?$model->last_name:''?>">
                                <label for="usermaster-last_name">Last name</label>
                                <div class="help-block"><?= (isset($model->getErrors('last_name')[0]) && $model->getErrors('last_name')[0] != null) ? $model->getErrors('last_name')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" id="usermaster-email" class="validate" name="UserMaster[email]" aria-required="true" aria-invalid="true" value="<?=($model->email!='')?$model->email:''?>">
                                <label for="usermaster-email">Email address</label>
                                <div class="help-block"><?= (isset($model->getErrors('email')[0]) && $model->getErrors('email')[0] != null) ? $model->getErrors('email')[0] : ''; ?></div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="usermaster-phone" class="validate" name="UserMaster[phone]" aria-required="true" aria-invalid="true" value="<?=($model->phone!='')?$model->phone:''?>">
                                <label for="usermaster-phone">Phone number</label>
                                <div class="help-block"><?= (isset($model->getErrors('phone')[0]) && $model->getErrors('phone')[0] != null) ? $model->getErrors('phone')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="usermaster-address" class="validate" name="UserMaster[address]" aria-required="true" aria-invalid="true" value="<?=($model->address!='')?$model->address:''?>">
                                <label for="usermaster-address">Type your full address</label>
                                <div class="help-block"><?= (isset($model->getErrors('address')[0]) && $model->getErrors('address')[0] != null) ? $model->getErrors('address')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col  s12">
                                <input type="hidden" id="autocomplete-init" value="0">
                                <input type="hidden" id="usermaster-latitude" class="form-control" name="UserMaster[latitude]" value="<?=($model->latitude!='')?$model->latitude:''?>">
                                <input type="hidden" id="usermaster-longitude" class="form-control" name="UserMaster[longitude]" value="<?=($model->longitude!='')?$model->longitude:''?>">
                                <input type="text" id="usermaster-zipcode" onkeyup="easyautocompleteInit('usermaster-zipcode')" class="validate" name="UserMaster[zipcode]" aria-required="true" aria-invalid="true" value="<?=($model->zipcode!='')?$model->zipcode:''?>">
                                <label for="usermaster-zipcode">Post code</label>
                                <div class="help-block"><?= (isset($model->getErrors('zipcode')[0]) && $model->getErrors('zipcode')[0] != null) ? $model->getErrors('zipcode')[0] : ''; ?></div>
                                <span class="helper-text" data-error="wrong" data-success="right">Only your postcode will be displayed publicly</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col  s12">
                                <input type="text" id="usermaster-suburb" class="" name="UserMaster[suburb]" value="<?=($model->suburb!='')?$model->suburb:''?>" readonly="true">
                                <label for="usermaster-suburb">Suburb</label>
                                <div class="help-block"><?= (isset($model->getErrors('suburb')[0]) && $model->getErrors('suburb')[0] != null) ? $model->getErrors('suburb')[0] : ''; ?></div>
                            </div>
                        </div>
<!--                        <div class="row">
                            <div class="input-field col  s12">
                                <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix new-avil-bx">
                                                    <select class="form-control selectpicker">
                                                      <option value="" disabled="" selected="">Select Suburb</option>
                                                    </select>
                                                 </div>
                                        </li>
                                    </ul>
                                <div class="help-block"><? (isset($model->getErrors('zipcode')[0]) && $model->getErrors('zipcode')[0] != null) ? $model->getErrors('zipcode')[0] : ''; ?></div>
                            </div>
                        </div>-->

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="group-radio">
                                    <h1>What type of care do you need?</h1>
                                    <p>
                                        <label>
                                            <input id="checkbox1" class="filled-in" type="checkbox" name="FamilyDetails[care_needed][]" value="1" <?= (count($model_det->care_needed) > 0 && in_array(1, $model_det->care_needed)) ? 'checked="checked"' : ''; ?>>
                                            <span>Child care</span>
                                        </label>
                                    </p>  
                                    <p>
                                        <label>
                                            <input id="checkbox2" class="filled-in" type="checkbox" name="FamilyDetails[care_needed][]" value="2" <?= (count($model_det->care_needed) > 0 && in_array(2, $model_det->care_needed)) ? 'checked="checked"' : ''; ?>>
                                            <span>Aged care</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input id="checkbox3" class="filled-in" type="checkbox" name="FamilyDetails[care_needed][]" value="3" <?= (count($model_det->care_needed) > 0 && in_array(3, $model_det->care_needed)) ? 'checked="checked"' : ''; ?>>
                                            <span>Disability care</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="help-block"><?= (isset($model_det->getErrors('care_needed')[0]) && $model_det->getErrors('care_needed')[0] != null) ? $model_det->getErrors('care_needed')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="usermaster-password" class="validate" name="UserMaster[password]" autocomplete="off" aria-required="true" aria-invalid="true" value="<?=($model->password!='')?$model->password:''?>">
                                <label for="usermaster-password">Password</label>
                                <div class="help-block"><?= (isset($model->getErrors('password')[0]) && $model->getErrors('password')[0] != null) ? $model->getErrors('password')[0] : ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="usermaster-retype_password" class="validate" name="UserMaster[retype_password]" autocomplete="off" aria-required="true" aria-invalid="true" value="<?=($model->retype_password!='')?$model->retype_password:''?>">
                                <label for="usermaster-retype_password">Retype password </label>
                                <div class="help-block"><?= (isset($model->getErrors('retype_password')[0]) && $model->getErrors('retype_password')[0] != null) ? $model->getErrors('retype_password')[0] : ''; ?></div>
                            </div>
                        </div>

                        <div class="up-img-area">
                            <!--<img class="img-responsive" src="images/picture.png" alt="">-->
                            <label class="btn btn-all">
                                <input type="file" class="form-control" accept="image/png, image/jpeg, image/gif" name="UserMaster[image]"/><i class="fa fa-upload" aria-hidden="true"></i>Upload a photo of yourself                                    
                            </label>
                        </div>

                        <div class="btn-rap new-btn-wrp text-center">
                            <ul>
                                <li>
                                    <a href="javascript:;" onclick="$('#family_registration').submit();" class="no-decor homepage-button booking-link"><span>SIGN UP</span></a>
                                </li>
                            </ul>

                        </div>

                        <?php ActiveForm::end() ?>

                        <p class="bottom-para"> By signing up, you agree to Eden Woolf <span>Terms of use</span> and <span>Privacy policy.</span></p>

                    </div>


                </div>
            </div>
        </div>
    </section>
</div>

<!-- *****************Join-end****************** -->

<script>
     function easyautocompleteInit(id) {
         $('#usermaster-suburb').val('');
    var csrfToken = '<?= Yii::$app->request->csrfToken ?>';
    var options1 = {
            url: function (phrase1) {
                return full_path + 'site/autosuggestion';
            },
            getValue: function (element) {
                $("#eac-container-" + id).show();
                return element.name;
            },
            ajaxSettings: {
                headers: {'X-CSRF-TOKEN': csrfToken},
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },
            preparePostData: function (data) {
                data.phrase1 = $("#" + id).val();
                return data;
            },
            template: {
                type: "custom",
                method: function (value, item) {
                        return '<table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td width="100%"><p><span class="ss-result-title" data-type="countries" data-id="' + item.postcode + '">' + value + '</span></p></td></tr></tbody></table>';
                }
            },
            requestDelay: 1000,
            list: {
                onMouseOverEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                },
                onSelectItemEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.postcode);
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-suburb').val(result.suburb);
                },
                onChooseEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.postcode);
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-suburb').val(result.suburb);
                        $('#usermaster-suburb').focus();
                }
            }
        };
 var autoval=$('#autocomplete-init').val();
 if(autoval==0){
     $('#autocomplete-init').val('1');
    $("#" + id).easyAutocomplete(options1); 
    $("#" + id).focus(); 
 }
     }

    $(document).on('click', '#close-preview', function () {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
        );
    });

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom',
            trigger: 'hover',
        });
        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });

    $(document).ready(function () {
        if ($('#usermaster-display_name').val() != "") {
            $('.fa-spin').show();
            $('.fa-check').hide();
            $('.fa-times').hide();
            $("#usermaster-display_name").parent().removeClass('has-error').find('.help-block').html('');
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: full_path + 'site/checkname',
                headers: {'X-CSRF-TOKEN': csrfToken},
                type: 'POST',
                dataType: 'json',
                data: {name: $('#usermaster-display_name').val(), type: $('#usermaster-type_id').val()},
                success: function (data) {
                    if (data.res == 1) {
                        $('.fa-check').show();
                    } else if (data.res == 0) {
                        $.each(data.error, function (key, val) {
                            $('.fa-times').show();
                            $("#usermaster-display_name").parent().addClass('has-error').find('.help-block').html(val);
                        });
                    }
                    $('.fa-spin').hide();
                }
            })
        }
    })

    function initMap() {
    }
//    $('#usermaster-address').keyup(function () {
//        var input = document.getElementById('usermaster-address');
//        var autocomplete = new google.maps.places.Autocomplete(input);
//        autocomplete.addListener('place_changed', function () {
//            var place = autocomplete.getPlace();
//            $("#usermaster-latitude").val(place.geometry.location.lat());
//            $("#usermaster-longitude").val(place.geometry.location.lng());
//        })
//    });
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>-->