<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Cardfile</h1>
<?php
global $current_user ;
get_current_user();


?>
<div class="bootstrap-wrapper">
    <div class="container">
        <div class="row">
            <form id="cardfile" class="form-horizontal" role="form">
                <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>">
                <input type="hidden" name="pp" id="pp" value="<?php echo $a['product'];?>">
                <div class="checkbox">
                    <label><input name="type" type="checkbox" value="kid">Jeg er over 16</label>
                </div>
                <div class="checkbox">
                    <label><input id="type" name="type" type="checkbox" value="parent">Jeg er forelder</label>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="first_name">Fornavn :</label>
                    <div class="col-sm-10">
                        <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Ola">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="last_name">Etternavn :</label>
                    <div class="col-sm-10">
                        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Nordmann">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Epost adresse :</label>
                    <div class="col-sm-10">
                        <input name="email" type="text" class="form-control" id="email" placeholder="ola@nordmann.no">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="phone_number">Telefon :</label>
                    <div class="col-sm-10">
                        <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="22334455">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="born">Fødselsdato :</label>
                    <div class="col-sm-10">
                        <input name="born" type="text" class="form-control" id="born" placeholder="22/11-1990">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="address_line_1">Adresse 1 :</label>
                    <div class="col-sm-10">
                        <input name="address_line_1" type="text" class="form-control" id="address_line_1" placeholder="Snarveien 7">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="address_line_2">Adresse 2 :</label>
                    <div class="col-sm-10">
                        <input name="address_line_2" type="text" class="form-control" id="address_line_2" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="postal_code">Postnummer :</label>
                    <div class="col-sm-10">
                        <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="1121">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="city">Sted :</label>
                    <div class="col-sm-10">
                        <input name="city" type="text" class="form-control" id="city" placeholder="Nabolaget">
                    </div>
                </div>
                <!-- child -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="child_first_name">Fornavn :</label>
                    <div class="col-sm-10">
                        <input name="child_first_name" type="text" class="form-control" id="child_first_name" placeholder="Ola">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="child_last_name">Etternavn :</label>
                    <div class="col-sm-10">
                        <input name="child_last_name" type="text" class="form-control" id="child_last_name" placeholder="Nordmann">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="child_email">Epost adresse :</label>
                    <div class="col-sm-10">
                        <input name="child_email" type="text" class="form-control" id="child_email" placeholder="ola@nordmann.no">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="child_phone_number">Telefon :</label>
                    <div class="col-sm-10">
                        <input name="child_child_fphone_number" type="text" class="form-control" id="child_phone_number" placeholder="22334455">
                    </div>
                </div>

                <!-- common -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="unit">Klubb :</label>
                    <div class="col-sm-10">
                        <input name="unit" type="text" class="form-control" id="unit" placeholder="Vinnerlaget">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="branch">Gren :</label>
                    <div class="col-sm-10">
                        <input name="branch" type="text" class="form-control" id="branch" placeholder="badminton">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="submit" type="submit" class="btn btn-primary submit">Submit</button>
                    </div>
                </div>
            </form>
            <div id='loadingDiv' class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title">venligst vent......</p>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                                    <!--<img src='/wp-content/plugins/experian_soap/public/img/ajax_loader_blue_512.gif' class="img-responsive" alt="loading..."/>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>