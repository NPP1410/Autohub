<?php
$pageName = 'claim-product';
$pageTitle = 'Claim Product';
$_title = 'แจ้งเคลมสินค้า | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="claim-product-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="claim-product" id="claimProduct">
                <section class="claim-product__stats" aria-label="ภาพรวมการเคลมสินค้า">
                    <article class="claim-product__stat">
                        <div class="claim-product__stat-heading">
                            <h2>รายการทั้งหมด</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>5</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-product__stat">
                        <div class="claim-product__stat-heading">
                            <h2>รอการตรวจสอบ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>2</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-product__stat claim-product__stat--processing">
                        <div class="claim-product__stat-heading">
                            <h2>กำลังดำเนินการ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>1</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-product__stat claim-product__stat--completed">
                        <div class="claim-product__stat-heading">
                            <h2>อนุมัติ / เสร็จสิ้น</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>3</strong><span>รายการ</span></p>
                    </article>
                </section>

                <section class="claim-product__panel" aria-labelledby="claimProductHeading">
                    <header class="claim-product__heading">
                        <h1 id="claimProductHeading">แจ้งเคลมสินค้า</h1>
                        <p>กรอกข้อมูลสินค้า ระบุปัญหาที่พบ และแนบรูปความเสียหายเพื่อแจ้งเคลมสินค้า</p>
                    </header>
                    <form id="claimProductForm" action="claim-product.php" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
                        <div class="claim-product__fields">
                            <div class="claim-product__field claim-product__field--half">
                                <label for="claimCustomerName">ชื่อ - นามสกุล</label>
                                <input type="text" id="claimCustomerName" name="customer_name" autocomplete="name" maxlength="150" required>
                            </div>
                            <div class="claim-product__field claim-product__field--half">
                                <label for="claimPhone">เบอร์ติดต่อ</label>
                                <input type="tel" id="claimPhone" name="phone" autocomplete="tel" inputmode="tel" maxlength="20" required>
                            </div>
                            <div class="claim-product__field claim-product__field--third">
                                <label for="claimProductName">สินค้าที่ต้องการเคลม</label>
                                <input type="text" id="claimProductName" name="product_name" maxlength="200" required>
                            </div>
                            <div class="claim-product__field claim-product__field--third">
                                <label for="claimSerial">Serial Number</label>
                                <input type="text" id="claimSerial" name="serial_number" autocomplete="off" maxlength="150" required>
                            </div>
                            <div class="claim-product__field claim-product__field--third">
                                <label for="claimQuantity">จำนวน</label>
                                <select id="claimQuantity" name="quantity" required>
                                    <option value="" selected disabled>เลือกจำนวน</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
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
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="claim-product__field">
                                <label for="claimProblem">ปัญหาที่พบ</label>
                                <textarea id="claimProblem" name="problem" rows="3" maxlength="5000" required></textarea>
                            </div>
                            <div class="claim-product__field">
                                <label for="claimDamagePhotos">แนบรูปความเสียหาย</label>
                                <div class="claim-product__upload">
                                    <input type="file" class="visually-hidden" id="claimDamagePhotos" name="damage_photos[]" multiple accept="image/jpeg,image/png,image/webp" aria-describedby="claimDamageHelp claimDamageStatus" required>
                                    <label for="claimDamagePhotos" class="claim-product__file-label">
                                        <span>แนบรูปเพิ่มเติม</span>
                                        <i class="bi bi-upload" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <p class="claim-product__hint" id="claimDamageHelp">เลือกได้หลายภาพ รองรับ JPG, PNG หรือ WEBP ขนาดไม่เกิน 5 MB ต่อภาพ</p>
                                <p class="claim-product__file-status" id="claimDamageStatus" role="status" aria-live="polite" hidden></p>
                                <ul class="claim-product__previews" id="claimDamagePreviews" aria-label="ตัวอย่างรูปความเสียหาย" hidden></ul>
                            </div>
                        </div>
                        <div class="claim-product__actions">
                            <button type="submit" class="claim-product__submit">ส่งข้อมูลการเคลมสินค้า</button>
                        </div>
                        <p class="claim-product__status" id="claimProductStatus" role="status" tabindex="-1" hidden></p>
                    </form>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
