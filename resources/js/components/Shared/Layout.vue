<template>
    <main>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="/">AnIndex</a>
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
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary input-group-btn"><i
                                class="fas fa-filter"></i>
                        </button>
                        <span class="bar"></span>
                    </div>
                </form>

                <button class="btn btn-secondary" type="button"
                        onclick="location.href='/sign-in'">
                    Login
                </button>
            </div>
        </nav>

        <article>
            <slot/>
        </article>
    </main>
</template>