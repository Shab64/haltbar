<form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <!-- <h2 class="clr-wht">CREATE YOUR PROFILE</h2> -->
                                <div class="bg-img-login-d"></div>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">First Name</p>
                                <input type="text" name="first_name" :value="old('first_name')" required autofocus class="form-control" />
                            </div>

                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Last Name</p>
                                <input type="text" name="last_name" :value="old('last_name')" required autofocus class="form-control" />
                            </div>

                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Email Address</p>
                                <input type="email" name="email" :value="old('email')" required class="form-control" />
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="font-size:12px; color:red;">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Phone Number</p>
                                <input type="text" type="tel" name="phone" :value="old('phone')" onkeypress="return onlyNumberKey(event)" required class="form-control" />
                            </div>

                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Select Graduation Year</p>
                                <!-- <input type="text" class="form-control" name="graduation_year" :value="old('graduation_year')" /> -->
                                <select class="form-control" name="graduation_year">
                                    <option value="">Select Year</option>
                                    <?php for ($i = Date('Y'); $i >= 1950; $i--) { ?>
                                        <option value="{{ $i }}">{{$i}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Hometown</p>
                                <input type="text" class="form-control" type="text" name="home_town" :value="old('home_town')" required />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">High school</p>
                                <input type="text" class="form-control" type="text" name="high_school" :value="old('high_school')" required />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Club/Travel Team</p>
                                <input type="text" name="ct_team" :value="old('ct_team')" class="form-control" />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Current Coach Email</p>
                                <input type="email" name="cc_email" :value="old('cc_email')" class="form-control" />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Parent/Guardian Email</p>
                                <input type="email" name="pg_email" :value="old('pg_email')" class="form-control" />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">Gender</p>
                                <select class="form-control" name="gender" onchange="setList()" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">height</p>
                                <input type="text" name="height" :value="old('height')" class="form-control" />
                            </div>
                            <div class="col-lg-4 mt-3">
                                <p class="clr-wht">GPA</p>
                                <input type="text" name="gpa" :value="old('gpa')" class="form-control" />
                            </div>
                        </div>
                        <div id="add_here">
                            <div class="row mt-3 ">

                                <div class="col-lg-4 mt-3">
                                    <p class="clr-wht">Select Sport</p>
                                    <select class="form-control" name="sports[]" id="" required>
                                        <option value="">Select</option>
                                        <option value="Baseball">Baseball</option>
                                        <option value="Basketball">Basketball</option>
                                        <option value="Cross Country">Cross Country</option>
                                        <option value="Fencing">Fencing</option>
                                        <option value="Football">Football</option>
                                        <option value="Golf">Golf</option>
                                        <option value="Gymnastics">Gymnastics</option>
                                        <option value="Ice Hockey">Ice Hockey</option>
                                        <option value="Lacrosse">Lacrosse</option>
                                        <option value="Rifle">Rifle</option>
                                        <option value="Skiing">Skiing</option>
                                        <option value="Soccer">Soccer</option>
                                        <option value="Swimming and Diving">Swimming and Diving</option>
                                        <option value="Tennis">Tennis</option>
                                        <option value="Track and Field (Indoor)">Track and Field (Indoor)</option>
                                        <option value="Track and Field (Outdoor)">Track and Field (Outdoor)</option>
                                        <option value="Volleyball">Volleyball</option>
                                        <option value="Water Polo">Water Polo</option>
                                        <option value="Wrestling">Wrestling</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <p class="clr-wht">Select Position</p>
                                    <select name="positions[]" class="form-control" id="" required>
                                        <option value="">Select</option>
                                        <option value="Striker">Striker</option>
                                        <option value="Defender">Defender</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 p-0 mt-3">
                            <button id="add_mm" type="button" class="btn btn-primary bt-add-more">+ Add More Sport</button>
                        </div>
                        <div class="col-lg-12 mt-3 text-right">
                            <input type="submit" style="width: 170px; color: white!important;" class="btn btn-primary bt-add-more " value="Finish" />
                        </div>


                </div>


                </form>