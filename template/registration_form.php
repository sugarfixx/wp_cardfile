<div id="imageBackground" class="col-md-10 col-md-offset-1">
    <div class="row">
        <div id="whiteBack" class="col-md-7">
            <form id="cardfile" class="form-horizontal" role="form">
                <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>">
                <div style="padding-top: 50px; padding-bottom: 50px;" class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <h2>REGISTRER DEG!</h2>
                        <p>Litt om hvorfor man skal registrere seg Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur elit?</p>
                        <div class="checkbox">
                            <label><input name="type" type="checkbox" value="kid">Jeg er over 16</label>
                        </div>
                        <div class="checkbox">
                            <label><input id="type" name="type" type="checkbox" value="parent">Jeg er forelder</label>
                        </div>
                        <a class="btn btn-primary text-center" onclick="openPane(event, 'tab2')" id="btnNext">Next</a>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="first_name">Fornavn :</label>
                            <div class="col-sm-8">
                                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Ola">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="last_name">Etternavn :</label>
                            <div class="col-sm-8">
                                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Nordmann">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Epost adresse :</label>
                            <div class="col-sm-8">
                                <input name="email" type="text" class="form-control" id="email" placeholder="ola@nordmann.no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="phone_number">Telefon :</label>
                            <div class="col-sm-8">
                                <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="22334455">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="born">Fødselsdato :</label>
                            <div class="col-sm-8">
                                <input name="born" type="text" class="form-control" id="born" placeholder="22/11-1990">
                            </div>
                        </div>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab3')"id="btnNext">Next</a>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab1')"id="btnPrevious">Previous</a>
                    </div>

                    <div class="tab-pane" id="tab3">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="address_line_1">Adresse 1 :</label>
                            <div class="col-sm-8">
                                <input name="address_line_1" type="text" class="form-control" id="address_line_1" placeholder="Snarveien 7">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="address_line_2">Adresse 2 :</label>
                            <div class="col-sm-8">
                                <input name="address_line_2" type="text" class="form-control" id="address_line_2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="postal_code">Postnummer :</label>
                            <div class="col-sm-8">
                                <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="1121">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="city">Sted :</label>
                            <div class="col-sm-8">
                                <input name="city" type="text" class="form-control" id="city" placeholder="Nabolaget">
                            </div>
                        </div>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab4')" id="btnNext">Next</a>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab2')" id="btnPrevious">Previous</a>
                    </div>

                    <div class="tab-pane" id="tab4">
                        <!-- child -->
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="child_first_name">Fornavn :</label>
                            <div class="col-sm-8">
                                <input name="child_first_name" type="text" class="form-control" id="child_first_name" placeholder="Ola">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="child_last_name">Etternavn :</label>
                            <div class="col-sm-8">
                                <input name="child_last_name" type="text" class="form-control" id="child_last_name" placeholder="Nordmann">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="child_email">Epost adresse :</label>
                            <div class="col-sm-8">
                                <input name="child_email" type="text" class="form-control" id="child_email" placeholder="ola@nordmann.no">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="child_phone_number">Telefon :</label>
                            <div class="col-sm-8">
                                <input name="child_child_fphone_number" type="text" class="form-control" id="child_phone_number" placeholder="22334455">
                            </div>
                        </div>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab5')" id="btnNext">Next</a>
                        <a class="btn btn-primary" onclick="openPane(event, 'tab3')" id="btnPrevious">Previous</a>
                    </div>

                    <div class="tab-pane" id="tab5">
                        <!-- common -->
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="unit">Klubb :</label>
                            <div class="col-sm-8">
                                <input name="unit" type="text" class="form-control" id="unit" placeholder="Vinnerlaget">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="branch">Gren :</label>
                            <div class="col-sm-8">
                                <input name="branch" type="text" class="form-control" id="branch" placeholder="badminton">
                            </div>
                        </div>
                        <div class="bottom-align-text col-sm-8">
                            <a class="btn btn-primary" onclick="openPane(event, 'tab4')" id="btnPrevious">Previous</a>
                            <button id="submit" type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="sidePic" class="col-md-5">
            &nbsp;
        </div>
    </div>
</div>