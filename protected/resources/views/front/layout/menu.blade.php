<nav class="navbar navbar-expand-md fixed-top" id="fcs-navbar">
    <a class="navbar-brand" href="{{ url('/')}}">
        <img src="http://fcs.wiryasoftware.com/assets/images/fcs-white.png">
    </a>
    <button style="border-color: white" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" style="color: white;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        {!! Session::get('menu') !!}
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#login" data-toggle="modal"><i class="fa fa-lock"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</nav>
<!-- MODAL -->
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body modal-body-custom">
                <p class="custom-title">Welcome</p>
                <p class="custom-subtitle">
                    Sign in to get personalized story recomedations, follow authors and topics you love, and interact with stories.
                </p>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="your email address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="your password">
                    </div>
                    <hr />
                    <button type="button" class="btn btn-block btn-blue" style="height: 50px"><i class="fa fa-lock"></i> Sign in</button>
                    <br />
                    <i>Don't have account? <a href="http://fcs.wiryasoftware.com/page/regist">regist here</a></i>
                </form>
            </div>
        </div>
    </div>
</div>  