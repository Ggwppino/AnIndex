<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">AnIndex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#play">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Donation</a>
            </li>
        </ul>

        <form class="form-inline navbar-form my-2 my-lg-0 searchbox">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-secondary input-group-btn" type="submit"><i class="fas fa-filter"></i>
                    </button>
                </div>
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="dropdown mr-sm-1" right>
            <button class="btn btn-secondary" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login <i class="fas fa-sign-in-alt"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <form class="px-4 py-3">
                    <div class="form-group">
                        <label for="nick">Nickname</label>
                        <input type="email" class="form-control" id="nick"
                               placeholder="nickname">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="ricordamiCheck">
                        <label class="form-check-label" for="ricordamiCheck">
                            Ricordami
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Sei nuovo? Registrati</a>
                <a class="dropdown-item" href="#">Password dimenticata?</a>
            </div>
        </div>
    </div>
</nav>