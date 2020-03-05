
<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <transition name="errorfade">
            <div class="alert alert-danger alert-dismissible fade show my-4 erroralert" role="alert" v-if="error">
                {{error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="error=''">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </transition>
        <form style="width:400px;height:650px;margin:auto;border:1px;background-color: #1f232d;margin-top:4%;margin-bottom:4%;border-radius:0.25em;text-align: center;">

            <h1 class="d-flex justify-content-center pt-5 pb-5">Login</h1>
            <div class="input-group" style="width:90%;margin:auto; padding-bottom:3em">
                <input type="text" class="form-control" required="required" title="" v-model="username">
                <label class="input-label">Username or Email</label>
                <span class="bar"></span>
            </div>
            <div class="input-group" style="width:90%;margin:auto; padding-bottom:3em">
                <input type="password" class="form-control" required="required" title="" @keyup.enter="submit"
                       v-model="password">
                <label class="input-label">Password</label>
                <span class="bar"></span>
            </div>
            <div class="custom-control custom-checkbox" @click="stayconnected=!stayconnected">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1" style="font-size: 12">Do you want to stay
                    connected?</label>
            </div>
            <div style="height: 100px; background-color: #ffffff; margin-top:2em;">captcha</div>
            <a class='btn btn-outline-info my-3 anime-link-info' @click="submit">
                <i class='fas fa-share'></i>Login</a>

            <div style="font-size: small;"><a href="#" style="color: #c0c4cc" id="forgotty">Forgot Password?</a></div>
            <div style="font-size: small; margin-top:55px">Not registered? <a href="sign-up">Create an account</a></div>

        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                error: "",
                username: "",
                password: "",
                stayconnected: false
            }
        },
        methods: {
            submit: function () {
                console.log("Perfect! " + this.username + " " + this.password);
                this.error = "Login Failed";
            },

        }
    }
</script>