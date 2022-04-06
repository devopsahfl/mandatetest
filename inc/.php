<?php
include 'header.php';
?>
    <div class="container-fluid content">
        <div class="row">
            <img src="img/banner/aboutusOverview.jpg" class="img-responsive" />
            <h3>Apply for Loan</h3>
            <p class="hidden-xs">
                <a href="index.php">Home </a>/ Apply for loan</p>
            <div class="bannerForm right">
                <?php include 'banner-form.php'; ?>
            </div>
        </div>
    </div>
    <div class="container content">
        <div class="row">
            <div class="col-md-8">
                <form id="applyLoan" name="applyLoan" method="post">
                    <div class="col-md-6">
						<div class="form-group">
							<input type="Name" class="forminput" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please enter a valid Name. Only alphabets and space allowed')"
								required pattern="[a-zA-Z][a-zA-Z\s]*" id="name" placeholder="Name" name="name">
						</div>
                        <div class="form-group">
                            <input type="Email" class="forminput" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="Email" placeholder="Email Id"
                                name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="forminput" maxlength="10" required id="Mobile" placeholder="Mobile Number" name="mobile">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="forminput" id="Landline" placeholder="Landline Number" name="landline">
                        </div>
                        <div class="form-group">
                            <div class="selectcon dob">
                                Date of Birth
                                <select class="forminput" name="ageday">
								<option value="">Day</option>
								<option value="1">01</option>
								<option value="2">02</option>
								<option value="3">03</option>
								<option value="4">04</option>
								<option value="5">05</option>
								<option value="6">06</option>
								<option value="7">07</option>
								<option value="8">08</option>
								<option value="9">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
							<select class="forminput" name="agemonth">
								<option value="">Month</option>
								<option value="01">Jan</option>
								<option value="02">Feb</option>
								<option value="03">Mar</option>
								<option value="04">Apr</option>
								<option value="05">May</option>
								<option value="06">Jun</option>
								<option value="07">Jul</option>
								<option value="08">Aug</option>
								<option value="09">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
							<select class="forminput" name="ageyear">
								<option value="">Year</option>
								<option value="">2016</option>
								<option value="">2015</option>
								<option value="">2014</option>
								<option value="">2013</option>
								<option value="">2012</option>
								<option value="">2011</option>
								<option value="">2010</option>
								<option value="">2009</option>
								<option value="">2008</option>
								<option value="">2007</option>
								<option value="">2006</option>
								<option value="">2005</option>
								<option value="">2004</option>
								<option value="">2003</option>
								<option value="">2002</option>
								<option value="">2001</option>
								<option value="">2000</option>
								<option value="">1999</option>
								<option value="">1998</option>
								<option value="">1997</option>
								<option value="">1996</option>
								<option value="">1995</option>
								<option value="">1994</option>
								<option value="">1993</option>
								<option value="">1992</option>
								<option value="">1991</option>
								<option value="">1990</option>
								<option value="">1989</option>
								<option value="">1988</option>
								<option value="">1987</option>
								<option value="">1986</option>
								<option value="">1985</option>
								<option value="">1984</option>
								<option value="">1983</option>
								<option value="">1982</option>
								<option value="">1981</option>
								<option value="">1980</option>
								<option value="">1979</option>
								<option value="">1978</option>
								<option value="">1977</option>
								<option value="">1976</option>
								<option value="">1975</option>
								<option value="">1974</option>
								<option value="">1973</option>
								<option value="">1972</option>
								<option value="">1971</option>
								<option value="">1970</option>
								<option value="">1969</option>
								<option value="">1968</option>
								<option value="">1967</option>
								<option value="">1966</option>
								<option value="">1965</option>
								<option value="">1964</option>
								<option value="">1963</option>
								<option value="">1962</option>
								<option value="">1961</option>
								<option value="">1960</option>
								<option value="">1959</option>
								<option value="">1958</option>
								<option value="">1957</option>
								<option value="">1956</option>
								<option value="">1955</option>
								<option value="">1954</option>
								<option value="">1953</option>
								<option value="">1952</option>
								<option value="">1951</option>
								<option value="">1950</option>
								<option value="">1949</option>
								<option value="">1948</option>
								<option value="">1947</option>
								<option value="">1946</option>
								<option value="">1945</option>
								<option value="">1944</option>
								<option value="">1943</option>
								<option value="">1942</option>
								<option value="">1941</option>
								<option value="">1940</option>
								<option value="">1939</option>
								<option value="">1938</option>
								<option value="">1937</option>
								<option value="">1936</option>
								<option value="">1935</option>
								<option value="">1934</option>
								<option value="">1933</option>
								<option value="">1932</option>
								<option value="">1931</option>
								<option value="">1930</option>
								<option value="">1929</option>
								<option value="">1928</option>
								<option value="">1927</option>
								<option value="">1926</option>
								<option value="">1925</option>
								<option value="">1924</option>
								<option value="">1923</option>
								<option value="">1922</option>
								<option value="">1921</option>
								<option value="">1920</option>
								<option value="">1919</option>
								<option value="">1918</option>
								<option value="">1917</option>
								<option value="">1916</option>
								<option value="">1915</option>
							</select>
                            </div>
                        </div>

                        <div class="form-group">

                            <select required class="forminput" onchange="print_city('cityf',this.selectedIndex);" id="state" class="forminput" name="state">
                                <option value="">Select State</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Bihar">Bihar</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Chandigarh">Chandigarh</option>
                            </select>
                            <select requiredclass="forminput" onchange="print_add($(this).val());" id="cityf" class="forminput" name="city">
                                <option value="">Aadhar's Nearest Branch
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="forminput" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please enter a valid location. Only alphabets and space allowed')"
                                required id="location" placeholder="Location" name="location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="forminput" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please enter a valid PIN Code. Only numbers till 6 digits allowed')"
                                pattern="[0-9]{6}" required id="PinCode" placeholder="PinCode" name="pincode">
                        </div>
                        <label class="padtop">
                            <select required class="forminput" name="employmentstatus" id="ddlEmploymentStatus">
                                <option value="">Employment Status</option>
                                <option>Salaried</option>
                                <option>Self Employed</option>
                                <option>Others</option>
                            </select>
                        </label>
                        <label class="padtop">
                            <select class="forminput" name="purposeofloan" id="ddlPurposeOfLoan">
                                <option value="">Purpose Of Loan</option>
                                <option value="New Flat/Home">New Flat/Home</option>
                                <option value="Resale Flat/Home">Resale Flat/Home</option>
                                <option value="Plot loan">Plot loan</option>
                                <option value="Loan against property">Loan against property</option>
                                <option value="Construction of own house">Construction of own house</option>
                                <option value="Home Renovation">Home Renovation</option>
                                <option value="Home Extension">Home Extension</option>
                            </select>
                        </label>
                        <label class="padtop">
                            <select class="forminput" name="loanamount" id="ddlLoanAmount">
                                <option value="">Loan Amount</option>
                                <option value="1,00,000< >5,00,000">1,00,000&lt; &gt;5,00,000</option>
                                <option value="5,00,000< >10,00,000">5,00,000&lt; &gt;10,00,000</option>
                                <option value="10,00,000< >15,00,000">10,00,000&lt; &gt;15,00,000</option>
                                <option value="15,00,000< >20,00,000">15,00,000&lt; &gt;20,00,000</option>
                                <option value="20,00,000< >25,00,000">20,00,000&lt; &gt;25,00,000</option>
                            </select>
                        </label>
                        <label class="padtop">
                            <select required class="forminput" name="monthlyincome" id="ddlMonthlySalary">
                                <option value="">Monthly Income</option>
                                <option value="Rs. <15,000"> &gt;15,000</option>
                                <option value="15,000> <30,000">15,000&lt; 30,000</option>
                                <option value="30,000> <50,000">30,000&lt; &gt;50,000</option>
                                <option value="50,000 >100,000">50,000 &gt;100,000</option>
                                <option value=">100,000">&lt;100,000</option>
                            </select>
                        </label>
                        <label class="padtop">
                            <select class="forminput" name="properybuytime" id="ddlBuyProperty">
                                <option value="">How soon you need the Loan</option>
                                <option value="<1 month">&lt;1 month</option>
                                <option value="1-3 months">1-3 months</option>
                                <option value="3-6 months">3-6 months</option>
                                <option value="After 6 month">After 6 months</option>
                            </select>
                        </label>
                        <label class="padtop">
                            <select class="forminput" name="preferredtime" id="ddlPreferredTime">
                                <option value="">Preferred Time to Call</option>
                                <option value="9-11am">9-11am</option>
                                <option value="11-1pm">11-1pm</option>
                                <option value="1-3pm">1-3pm</option>
                                <option value="3-5pm">3-5pm</option>
                                <option value="5-6pm">5-6pm</option>
                                <option value="After 6pm">After 6pm</option>
                            </select>
                        </label>
                        <button type="submit" class="formSubmit" value="Submit" name="loansubmit" id="btnsubmit" style="border:0; "><strong>Submit</strong>
						</button>
                    </div>
                </form>
            </div>
            <?php
        include 'sidebar.php';
        ?>
        </div>
    </div>
    <?php 
include 'category-footer.php';
?>

<?php
include 'footer-menu.php';
include 'footer.php';
?>