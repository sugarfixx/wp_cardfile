<?php
/**
 * Created by PhpStorm.
 * User: Sugarfixx
 * Date: 22/11/17
 * Time: 11:22
 */
$parent = $parent[1];
echo '<pre>';
print_r($parent);
echo '</pre>';
?>
<h3>Update</h3>
<div id="imageBackground" class="col-md-12">
    <div class="row">
        <div id="whiteBack" class="col-md-12">
            <div class="tab">
                <button class="tablinks" onclick="openPane(event, 'tab1')">Din info</button>
                <?php if (isset($children)) {
                    $i = 2;
                    foreach ($children as $child) {
                        $pane_id = "'tab" . $i++ ."'";
                        echo '<button class="tablinks" onclick="openPane(event, '. $pane_id .')">Barn info</button>';
                    }
                }
                ?>
                <button class="tablinks" onclick="openPane(event, 'tab_add')">Leggtil barn</button>
            </div>

            <div style="padding-top: 50px; padding-bottom: 50px;" class="tab-content">
                <!-- parent tab start-->
                <div class="tab-pane active" id="tab1">
                    <form id="cardfile" class="form-horizontal" role="form">
                        <input type="hidden" name="user_id" <?php echo (isset($parent->id)) ? 'value="'.$parent->id. '"': '';?>>
                        <input name="type" type="hidden" value="parent">
                        <h3>Informasjon om deg</h3>
                            <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="first_name">Fornavn :</label>
                            <div class="col-sm-10">
                                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Ola" <?php echo (isset($parent->first_name)) ? 'value="'.$parent->first_name. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="last_name">Etternavn :</label>
                            <div class="col-sm-10">
                                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Nordmann" <?php echo (isset($parent->last_name)) ? 'value="'.$parent->last_name. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Epost adresse :</label>
                            <div class="col-sm-10">
                                <input name="email" type="text" class="form-control" id="email" placeholder="ola@nordmann.no" <?php echo (isset($parent->email)) ? 'value="'.$parent->email. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="phone_number">Telefon :</label>
                            <div class="col-sm-10">
                                <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="22334455" <?php echo (isset($parent->phone_number)) ? 'value="'.$parent->phone_number. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="born">Fødselsdato :</label>
                            <div class="col-sm-10">
                                <input name="born" type="text" class="form-control" id="born" placeholder="22/11-1990" <?php echo (isset($parent->born)) ? 'value="'.$parent->born. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address_line_1">Adresse 1 :</label>
                            <div class="col-sm-10">
                                <input name="address_line_1" type="text" class="form-control" id="address_line_1" placeholder="Snarveien 7" <?php echo (isset($parent->address_line_1)) ? 'value="'.$parent->address_line_1. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address_line_2">Adresse 2 :</label>
                            <div class="col-sm-10">
                                <input name="address_line_2" type="text" class="form-control" id="address_line_2" placeholder="" <?php echo (isset($parent->address_line_2)) ? 'value="'.$parent->address_line_2. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="postal_code">Postnummer :</label>
                            <div class="col-sm-10">
                                <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="1121" <?php echo (isset($parent->postal_code)) ? 'value="'.$parent->postal_code. '"': '';?> >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="city">Sted :</label>
                            <div class="col-sm-10">
                                <input name="city" type="text" class="form-control" id="city" placeholder="Nabolaget" <?php echo (isset($parent->city)) ? 'value="'.$parent->city. '"': '';?>>
                            </div>
                        </div>
                        <div class="bottom-align-text col-sm-10">
                            <button id="submit" type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- parent tab end -->
                <?php if (isset($children)){ $i = 2;?>
                <?php foreach ($children as $child) { $pane_id = 'tab' . $i++; ?>
                <!-- child tab start -->
                <div class="tab-pane" id="<?php echo $pane_id; ?>">
                    <form id="cardfile" class="form-horizontal" role="form">
                        <input type="hidden" name="user_id" <?php echo (isset($child->id)) ? 'value="'.$parent->id. '"': '';?>>

                        <h3>Informasjon om barnet</h3>
                        <hr>
                        <input name="type" type="hidden" value="kid">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="child_first_name">Fornavn :</label>
                            <div class="col-sm-10">
                                <input name="child_first_name" type="text" class="form-control" id="child_first_name" placeholder="Ola" <?php echo (isset($child->first_name)) ? 'value="'.$child->first_name. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="child_last_name">Etternavn :</label>
                            <div class="col-sm-10">
                                <input name="child_last_name" type="text" class="form-control" id="child_last_name" placeholder="Nordmann" <?php echo (isset($child->last_name)) ? 'value="'.$child->last_name. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="born">Fødselsdato :</label>
                            <div class="col-sm-10">
                                <input name="born" type="text" class="form-control" id="born" placeholder="22/11-1990" <?php echo (isset($child->born)) ? 'value="'.$child->born. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="child_email">Epost adresse :</label>
                            <div class="col-sm-10">
                                <input name="child_email" type="text" class="form-control" id="child_email" placeholder="ola@nordmann.no" <?php echo (isset($child->email)) ? 'value="'.$child->email. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="child_phone_number">Telefon :</label>
                            <div class="col-sm-10">
                                <input name="child_child_fphone_number" type="text" class="form-control" id="child_phone_number" placeholder="22334455" <?php echo (isset($child->phone_number)) ? 'value="'.$child->phone_number. '"': '';?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="unit">Klubb :</label>
                            <div class="col-sm-10">
                                <select name="unit" class="form-control" id="unit" placeholder="Vinnerlaget">
                                    <?php foreach($unit_options as $option): ?>
                                        <option value="<?php echo $option; ?>" <?php if($option == $child->unit) {echo  "selected";}?> ><? echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<input name="unit" type="text" class="form-control" id="unit" placeholder="Vinnerlaget">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="branch">Gren :</label>
                            <div class="col-sm-10">
                                <select name="branch" class="form-control" id="unit" placeholder="Vinnerlaget">
                                    <?php foreach($branch_options as $option): ?>
                                        <option value="<?php echo $option; ?>" <?php if($option == $child->branch) {echo  "selected";}?>><? echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<input name="branch" type="text" class="form-control" id="branch" placeholder="badminton">-->
                            </div>
                        </div>
                        <div class="bottom-align-text col-sm-10">
                            <button id="submit" type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </form>
                </div>
                <?php }} ?>
                <!-- child tab end -->
                <!--  add child tab start -->
                <div class="tab-pane" id="tab_add">
                    <form id="cardfile" class="form-horizontal" role="form">
                        <!-- child -->
                        <h3>Informasjon om barnet</h3>
                        <hr>
                        <input name="type" type="hidden" value="add_kid">
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
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="unit">Klubb :</label>
                            <div class="col-sm-10">
                                <select name="unit" class="form-control" id="unit" placeholder="Vinnerlaget">
                                    <?php foreach($unit_options as $option): ?>
                                        <option value="<?php echo $option; ?>"><? echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<input name="unit" type="text" class="form-control" id="unit" placeholder="Vinnerlaget">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="branch">Gren :</label>
                            <div class="col-sm-10">
                                <select name="branch" class="form-control" id="unit" placeholder="Vinnerlaget">
                                    <?php foreach($branch_options as $option): ?>
                                        <option value="<?php echo $option; ?>"><? echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<input name="branch" type="text" class="form-control" id="branch" placeholder="badminton">-->
                            </div>
                        </div>
                        <div class="bottom-align-text col-sm-10">
                            <button id="submit" type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>