<x-app-layout>
    
    @push('style')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

            body {
                background: #f5f7fb;
                font-family: 'Inter', sans-serif;
            }
            .card-container {
                display: flex;
                align-items: center;
                margin: 0 auto;
                width: 800px;
                height: 100vh;
            }
            .card-left{
                background: linear-gradient(90deg, #EB3349 0%, #F45C43 100%);
                padding: 40px;
                width: 400px;
                border-radius: 5px 0 0 5px;
                color: #fff;
            }
            .card-right{
                background: #fff;
                padding: 40px;
                width: 400px;
                border-radius: 0 5px 5px 0;
            }
            .card-right .card-title{
                margin-bottom: 20px;
            }

            .card-right .card-title h4{
                margin: 0;
            }

            .card-right .card-title small{
                font-style: normal;
                font-weight: 400;
                font-size: 14px;
                line-height: 18px;
                color: rgba(0, 0, 0, 0.5);
            }

            .card-right .form-group {
                margin-bottom: 20px;
            }

            .card-right .form-group label {
                font-size: 14px;
                margin-bottom: 5px;
            }

            @media screen and (max-width:756px) {
                .card-container { 
                    flex-direction: column;
                    width: 100%;
                    justify-content: center;
                }
                .card-left {
                    width: 100%;
                    border-radius: 5px 5px 0 0;
                }

                .card-right {
                    width: 100%;
                    border-radius: 0 0 5px 5px;
                }

                .card-container .d-flex {
                    display: block !important;
                    width: 100%;
                }
            }
        </style>
    @endpush
    <div class="container">
        <div class="card-container">
            <div class="d-flex shadow">
                <div class="col-md-6 card-left">
                    <h4 class="mb-0 mt-3">Welcome Back!</h4>
                    <small>Silakan masuk terlebih dahulu.</small>
                </div>
                <div class="col-md-6 card-right">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    <div class="card-title">
                        <h4>Login</h4>
                        <small>Masuk menggunakan akun anda!</small>
                    </div>
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Email Address or Username</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email Address or Username"/>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="********"/>
                        </div>
                        <div class="form-group pt-1">
                            <button type="submit" class="btn btn-primary px-3 py-2">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>