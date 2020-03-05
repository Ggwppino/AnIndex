<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <transition name="errorfade">
            <div class="alert alert-danger alert-dismissible fade show my-4 erroralert" role="alert"
                 v-if="errors.terms || errors.captcha " style="width: 500px !important;">
                <span v-if="errors.terms">You must agree to our terms of service <br/></span>
                <span v-if="errors.captcha">You must complete captcha</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="delerror">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </transition>
        <transition name="boh">
        <form style="width:400px;margin:auto;border:1px;background-color: #1f232d;margin-top:4%;margin-bottom:4%;border-radius:0.25em;text-align: center;">
            <h1 class="d-flex justify-content-center pt-5 pb-5">Register</h1>
            <div class="input-group" style="width:90%;margin:auto; padding-bottom:2em">
                <input type="text" class="form-control" required="required" title="" v-model="email">
                <label class="input-label">Email</label>
                <span class="bar"></span>
                <div class="invalid-feedback" style="display: flex" v-if="errors.email">
                    Please provide a valid email.
                </div>
                <div class="invalid-feedback" style="display: flex" v-else-if="errors.emailtaken">
                    Email already exists.
                </div>
            </div>

            <div class="input-group" style="width:90%;margin:auto; padding-bottom:2em">
                <input type="text" class="form-control" required="required" title="Must be 5-20 characters long."
                       v-model="username" style="">
                <button type="button" style="background-color:transparent; border:none" @click="searchUser">
                    <i class="material-icons" style="color:#38c172;" v-if="userfree"> check</i>
                    <i class="material-icons" style="color:#ff1d5e;" v-else> check</i></button>
                <label class="input-label">Username</label>
                <span class="bar"></span>
                <div class="invalid-feedback" style="display: flex" v-if="errors.usertaken">
                    Username has already been taken.
                </div>
                <div class="invalid-feedback" style="display: flex" v-else-if="errors.userlength">
                    Must be 5-20 characters long.
                </div>
                <div class="valid-feedback" style="display: flex" v-else-if="userfree">
                    Username avaible
                </div>
                <small id="emailHelp" class="form-text text-muted" v-else>Must be 5-20 characters long.</small>

            </div>
            <div class="input-group" style="width:90%;margin:auto; padding-bottom:2em">
                <input type="password" class="form-control" required="required" title="" v-model="password">
                <label class="input-label">Password</label>
                <span class="bar"></span>
                <div class="invalid-feedback" style="display: flex" v-if="errors.password">
                    Must be 8-20 characters long.
                </div>
                <small id="emailHelp" class="form-text text-muted" v-else>Must be 8-20 characters long.</small>
            </div>
            <div class="input-group" style="width:90%;margin:auto; padding-bottom:2em">
                <input type="password" class="form-control" required="required" title="" v-model="repassword">
                <label class="input-label">Confirm Password</label>
                <span class="bar"></span>
                <div class="invalid-feedback" style="display: flex" v-if="errors.repassword">
                    The confirm password and password must match.
                </div>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" @click="viewcaptcha=!viewcaptcha"
                       v-model="terms">
                <label class="custom-control-label" for="customCheck1" style="font-size: 12"><a href="#">You agree to
                    our terms of service</a></label>
            </div>
            <transition name="captchadiv">
                <div style="height: 100px; background-color: #ffffff; margin-top:2em;" v-show="viewcaptcha">captcha
                </div>
            </transition>
            <a class='btn btn-outline-info my-3 anime-link-info' @click="submit">
                <i class='fas fa-share'></i>Register
            </a>

        </form></transition>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                errors: {
                    email: false,
                    emailtaken: false,
                    usertaken: false,
                    userlength: false,
                    password: false,
                    repassword: false,
                    captcha: false,
                    terms: false
                },
                email: "",
                username: "",
                userfree: false,
                password: "",
                repassword: "",
                terms: false,
                viewcaptcha: false,
                captcha: false
            }
        },
        methods: {
            submit: function () {
                if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) {
                    this.errors.emailtaken = false;
                    this.errors.email = true;
                } else {
                    this.errors.email = false;
                    this.errors.emailtaken = true;
                }

                if (!(/^\w{5,20}$/.test(this.username))) {
                    this.errors.usertaken = false;
                    this.errors.userlength = true;
                } else {
                    this.errors.userlength = false;
                    this.errors.usertaken = true;
                }

                this.errors.password = false;
                if (this.password.length < 8 || this.password.length > 20) this.errors.password = true;
                else if (!(/^\w*[0-9]\w*[0-9](\w*[0-9]*)*$/.test(this.password))) this.errors.password = true;

                if (this.password != this.repassword) {
                    this.errors.repassword = false;
                    this.errors.repassword = true;
                } else this.errors.repassword = false;
                this.errors.captcha = false;
                this.errors.captcha = true;
                if (!this.terms) {
                    this.errors.terms = false;
                    this.errors.terms = true
                }
            },
            delerror: function () {
                setTimeout(() => {
                    this.errors.captcha = false;
                    this.errors.terms = false;
                }, 100);
            },
            searchUser: function () {
                if (!(/^\w{5,20}$/.test(this.username))) {
                    this.errors.usertaken = false;
                    this.userfree = false;
                    this.errors.userlength = true;
                } else if (Math.random() < 0.5) {
                    this.userfree = false;
                    this.errors.userlength = false;
                    this.errors.usertaken = true;
                } else {
                    this.errors.usertaken = false;
                    this.errors.userlength = false;
                    this.userfree = true;
                }
            }
        }
    }
</script>