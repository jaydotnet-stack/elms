<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Test Questions</h4>
        </div>
        <hr/>
        <div class="card-title">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</button>
                    <div class="dropdown-menu">	<a class="dropdown-item" href="#">CSC 301</a>
                        <a class="dropdown-item" href="#">CSC 402</a>
                        <a class="dropdown-item" href="#">MTH 101</a>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        
        <form class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="validationTextarea">Question 1</label>
                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">Please enter a message in the textarea.</div>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>
    <form class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="validationTextarea">Question 2</label>
                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">Please enter a message in the textarea.</div>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>
    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Edit or delete Questions</h4>
            </div>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">What is a Computer</th>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Delete</button>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            <th scope="row">Define Encryption</th>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Delete</button>
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row">which one is not the type of a Computer</th>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary" type="button">Delete</button>
                            </td>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>

    
