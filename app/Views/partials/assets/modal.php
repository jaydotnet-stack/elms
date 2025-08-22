<!-- Modal  added new quiz-->
<div class="modal fade" id="modalSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header bb-n40dash">
        <h5 class="modal-title" id="exampleModalLabel"><?= APP_NAMESPACE; ?></h5>
            <button type="button" class="btn-clos" data-bs-dismiss="modal" aria-label="Close">
                <span class="radius100 cmn__icon32 bg1-color d-center p-4">
                    <i class="ti ti-x p1-color fs-five"></i>
                </span>
            </button>
        </div>
        <div class="modal-body border-0">
            <div class="py-xxl-4 py-xl-3 py-lg-1 py-0 px-xxl-4 px-xl-3 px-lg-1 px-0">
                <div class="n20-bg rounded n40border py-xxl-6 py-3 px-xxl-6 px-3">
                    <form action="#0" class="bb-n40dash pb-xxl-6 pb-6 mb-xxl-5 mb-4">
                        <div class="row g-lg-6 g-4">
                            <label for="qus1" class="fs-six fw_500 mb-xxl-4 mb-3" id='msgSuccessBody'>Question</label>
                            <!-- <div class="col-lg-12">
                                <div class="cmn-quizinput bb-n40dash pb-xxl-6 pb-4">
                                    <label for="qus1" class="fs-six fw_500 mb-xxl-4 mb-3">Question</label>
                                    <input type="text" id="qus1" placeholder="Write a question" class="input-area n0-bg radius30">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus2" class="fs-six fw_500 mb-xxl-4 mb-3">Option : A</label>
                                    <input type="text" id="qus2" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus3" class="fs-six fw_500 mb-xxl-4 mb-3">Option : B</label>
                                    <input type="text" id="qus3" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div> -->
                        </div>
                    </form>
                    <div class="modal-footer border-0 gap-xxl-4 gap-2 pt-0 pb-0 pe-0 ps-0 justify-content-start">
                        <!-- <button type="button" class="cmn-btn n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Add Quiz
                        </span>
                        </button> -->
                        <button type="button" class="cmn-btn second-alt n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                            <span>
                                Ok
                            </span>
                        </button>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Modal  added new quiz-->

<!-- Modal  added new quiz-->
<div class="modal fade" id="modalWarning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header bb-n40dash">
        <h5 class="modal-title" id="exampleModalLabel"><?= APP_NAMESPACE; ?></h5>
            <button type="button" class="btn-clos" data-bs-dismiss="modal" aria-label="Close">
                <span class="radius100 cmn__icon32 bg1-color d-center p-4">
                    <i class="ti ti-x p1-color fs-five"></i>
                </span>
            </button>
        </div>
        <div class="modal-body border-0">
            <div class="py-xxl-4 py-xl-3 py-lg-1 py-0 px-xxl-4 px-xl-3 px-lg-1 px-0">
                <div class="n20-bg rounded n40border py-xxl-6 py-3 px-xxl-6 px-3">
                    <form action="#0" class="bb-n40dash pb-xxl-6 pb-6 mb-xxl-5 mb-4">
                        <div class="row g-lg-6 g-4">
                            <label for="qus1" class="fs-six fw_500 mb-xxl-4 mb-3" id='msgWarningBody'>Question</label>
                            <!-- <div class="col-lg-12">
                                <div class="cmn-quizinput bb-n40dash pb-xxl-6 pb-4">
                                    <label for="qus1" class="fs-six fw_500 mb-xxl-4 mb-3">Question</label>
                                    <input type="text" id="qus1" placeholder="Write a question" class="input-area n0-bg radius30">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus2" class="fs-six fw_500 mb-xxl-4 mb-3">Option : A</label>
                                    <input type="text" id="qus2" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus3" class="fs-six fw_500 mb-xxl-4 mb-3">Option : B</label>
                                    <input type="text" id="qus3" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div> -->
                        </div>
                    </form>
                    <div class="modal-footer border-0 gap-xxl-4 gap-2 pt-0 pb-0 pe-0 ps-0 justify-content-start">
                        <!-- <button type="button" class="cmn-btn n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Add Quiz
                        </span>
                        </button> -->
                        <button type="button" class="cmn-btn second-alt n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                            <span>
                                Ok
                            </span>
                        </button>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Modal  added new quiz-->

<!-- Modal  added new quiz-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header bb-n40dash">
        <h5 class="modal-title" id="exampleModalLabel">Add New Quiz</h5>
        <button type="button" class="btn-clos" data-bs-dismiss="modal" aria-label="Close">
            <span class="radius100 cmn__icon32 bg1-color d-center p-4">
                <i class="ti ti-x p1-color fs-five"></i>
            </span>
        </button>
        </div>
        <div class="modal-body border-0">
            <div class="py-xxl-4 py-xl-3 py-lg-1 py-0 px-xxl-4 px-xl-3 px-lg-1 px-0">
                <div class="n20-bg rounded n40border py-xxl-6 py-3 px-xxl-6 px-3">
                    <form action="#0" class="bb-n40dash pb-xxl-6 pb-6 mb-xxl-5 mb-4">
                        <div class="row g-lg-6 g-4">
                            <div class="col-lg-12">
                                <div class="cmn-quizinput bb-n40dash pb-xxl-6 pb-4">
                                    <label for="qus1" class="fs-six fw_500 mb-xxl-4 mb-3">Question</label>
                                    <input type="text" id="qus1" placeholder="Write a question" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus2" class="fs-six fw_500 mb-xxl-4 mb-3">Option : A</label>
                                    <input type="text" id="qus2" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus3" class="fs-six fw_500 mb-xxl-4 mb-3">Option : B</label>
                                    <input type="text" id="qus3" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus4" class="fs-six fw_500 mb-xxl-4 mb-3">Option : C</label>
                                    <input type="text" id="qus4" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus5" class="fs-six fw_500 mb-xxl-4 mb-3">Option : D</label>
                                    <input type="text" id="qus5" placeholder="Write a option" class="input-area n0-bg radius30">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer border-0 gap-xxl-4 gap-2 pt-0 pb-0 pe-0 ps-0 justify-content-start">
                        <button type="button" class="cmn-btn n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Add Quiz
                        </span>
                        </button>
                        <button type="button" class="cmn-btn second-alt n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Close
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Modal  added new quiz-->

<!-- Edit quiz-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        <div class="modal-header bb-n40dash">
            <h5 class="modal-title" id="exampleModalLabel2">Edit Question </h5>
            <button type="button" class="btn-clos" data-bs-dismiss="modal" aria-label="Close">
            <span class="radius100 cmn__icon32 bg1-color d-center p-4">
                <i class="ti ti-x p1-color fs-five"></i>
            </span>
            </button>
        </div>
        <div class="modal-body border-0">
            <div class="py-xxl-4 py-xl-3 py-lg-1 py-0 px-xxl-4 px-xl-3 px-lg-1 px-0">
                <div class="n20-bg rounded n40border py-xxl-6 py-3 px-xxl-6 px-3">
                    <form action="#0" class="bb-n40dash pb-xxl-6 pb-6 mb-xxl-5 mb-4">
                        <div class="row g-lg-6 g-4">
                            <div class="col-lg-12">
                                <div class="cmn-quizinput bb-n40dash pb-xxl-6 pb-4">
                                    <label for="qus6" class="fs-six fw_500 mb-xxl-4 mb-3">Question : 01</label>
                                    <input type="text" id="qus6" placeholder="What is the primary focus of the field of epidemiology?" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus7" class="fs-six fw_500 mb-xxl-4 mb-3">Option : A</label>
                                    <input type="text" id="qus7" placeholder="Diagnosis of diseases" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus8" class="fs-six fw_500 mb-xxl-4 mb-3">Option : B</label>
                                    <input type="text" id="qus8" placeholder="Treatment planning" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus9" class="fs-six fw_500 mb-xxl-4 mb-3">Option : C</label>
                                    <input type="text" id="qus9" placeholder="Disease prevention and patterns" class="input-area n0-bg radius30">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cmn-quizinput">
                                    <label for="qus10" class="fs-six fw_500 mb-xxl-4 mb-3">Option : D</label>
                                    <input type="text" id="qus10" placeholder="Surgical procedures" class="input-area n0-bg radius30">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer border-0 gap-xxl-4 gap-2 pt-0 pb-0 pe-0 ps-0 justify-content-start">
                        <button type="button" class="cmn-btn n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Save Change
                        </span>
                        </button>
                        <button type="button" class="cmn-btn second-alt n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-dismiss="modal">
                        <span>
                            Close
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Edit quiz-->

<div style='display:none'>

    <button type="button" class="cmn-btn second-alt n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <span>
            Add New Quiz
        </span>
    </button>

    <button type="button" id='modalSuccessBtn' class="cmn-btn second-alt n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-toggle="modal" data-bs-target="#modalSuccess">
        <span>
            ---
        </span>
    </button>

    <button type="button" id='modalWarningBtn' class="cmn-btn second-alt n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5" data-bs-toggle="modal" data-bs-target="#modalWarning">
        <span>
            ---
        </span>
    </button>

    <button type="button" id='modaltrigger' class="d-inline-flex affnone align-items-center gap-1 p1-bg py-2 px-4 rounded n600-color fs-eight fw_500"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
        <i class="ti ti-edit fw_400 fs-seven n600-color"></i>
        Edit
    </button>

</div>
                              