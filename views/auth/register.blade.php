@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- 追加 -->
                        <div class="form-group row">
                            <label for="screen_name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>

                            <div class="col-md-6">
                                <input id="screen_name" type="text" class="form-control @error('screen_name') is-invalid @enderror" name="screen_name" value="{{ old('screen_name') }}" required autocomplete="screen_name" autofocus>

                                @error('screen_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group check0" style="text-align:center;">
                          <p>アカウント登録ボタンをクリックする事により、以下の利用規約を同意したこととなります。</p>
                          <details>
                            <div style="text-align:left!important">
                            <summary>利用規約</summary>
                            <p>第1条<br>
当利用規約は，当サービスの利用に関わる全ての関係に適用されるものとします。
サービスに関し，本規約のほか，ご利用にあたってのルール等，各種の定め（以下，「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず，本規約の一部を構成するものとします。
本規約の規定が前条の個別規定の規定と矛盾する場合には，個別規定において特段の定めなき限り，個別規定の規定が優先されるものとします。<br>
第2条<br>
当サービスにおいては，登録希望者が当規約に同意の上，当サービスの定められた方法によって利用登録を行う事で、登録が完了するものとします。<br>
当サービスは，利用登録者に以下の事柄があると判断した場合，利用登録者に対する通告を省き、アカウントを削除する事があります。その理由については一切の開示義務を負わないものとします。<br>
利用登録の申請に際して虚偽の事項を届け出た場合<br>
本規約に違反したことがある者からの申請である場合<br>
その他，当サービスが利用を相当でないと判断した場合<br>
第3条<br>
ユーザーは，自己の責任によって，本サービスのメールアドレスおよびパスワードを適切に管理するものとします。<br>
ユーザーはいかなる場合にも，メールアドレスおよびパスワードを第三者に譲渡または貸与し，もしくは第三者と共用することはできません。<br>
当サイトは，メールアドレスとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのメールアドレスを登録しているユーザー自身による利用とみなします。<br>
メールアドレス及びパスワードが第三者によって使用されたことによって生じた損害は，当サービスは一切の責任を負わないものとします。<br>
第5条<br>
ユーザーは当サービスの利用にあたり，以下の行為をしてはなりません。<br>

法令または公序良俗に違反する行為<br>
犯罪行為に関連する行為<br>
当サービスの他のユーザー，または第三者のサーバーまたはネットワークの機能を破壊したり，妨害したりする行為<br>
当サービスの運営を妨害するおそれのある行為<br>
他のユーザーに関する個人情報等を収集または蓄積する行為<br>
不正アクセスをし，またはこれを試みる行為<br>
他のユーザーに成りすます行為<br>
当サービスに関連して，反社会的勢力に対して直接または間接に利益を供与する行為<br>
当サービスの他のユーザーまたは第三者の知的財産権，プライバシー，名誉その他の権利または利益を侵害する行為<br>
以下の表現を含み，または含むと当社が判断する内容を当サービス上に投稿し，または送信する行為<br>
その他反社会的な内容を含み他人に不快感を与える表現<br>
以下を目的とし，または目的とすると当サービス管理者が判断する行為<br>
当サービスの他のユーザー，または第三者に不利益，損害または不快感を与えることを目的とする行為<br>
その他当サービスが予定している利用目的と異なる目的で当サービスを利用する行為<br>
その他，当サービスが不適切と判断する行為<br>
第6条<br>
当サービスは，以下のいずれかの事由があると判断した場合，ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。<br>
当サービスにかかるコンピュータシステムの保守点検または更新を行う場合<br>
地震，落雷，火災，停電または天災などの不可抗力により，当サービスの提供が困難となった場合<br>
コンピュータまたは通信回線等が事故により停止した場合<br>
その他，当サービスの提供が困難と判断した場合<br>
当サービスの提供の停止または中断により，ユーザーまたは第三者が被ったいかなる不利益または損害についても，一切の責任を負わないものとします。<br>

第7条<br>
当サービスは，ユーザーが以下のいずれかに該当する場合には，事前の通知なく，投稿データを削除し，ユーザーに対して当サービスの全部もしくは一部の利用を制限しまたはユーザーとしての登録を抹消することができるものとします。<br>
本規約のいずれかの条項に違反した場合<br>
登録事項に虚偽の事実があることが判明した場合<br>
当サービスについて，最終の利用から一定期間利用がない場合<br>
その他，当サービスの利用を適当でないと判断した場合<br>
当サービスは，本条に基づき当サービス運営者が行った行為によりユーザーに生じた損害について，一切の責任を負いません。<br>

第8条<br>
当サービスに事実上または法律上の瑕疵（安全性，信頼性，正確性，完全性，有効性，特定の目的への適合性，セキュリティなどに関する欠陥，エラーやバグ，権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。<br>
当サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。<br>
当サービスに関して，ユーザーと他のユーザーまたは第三者との間において生じた取引，連絡または紛争等について一切責任を負いません。<br>
第9条<br>
当サービスは，ユーザーに通知することなく，当サービスの内容を変更または当サービスの提供を中止することができるものとし，これによってユーザーに生じた損害について一切の責任を負いません。<br>

第10条<br>
当サービスは，必要と判断した場合には，ユーザーに通知することなく本規約を変更することができるものとします。なお，本規約の変更後，当サービスの利用を開始した場合には，当該ユーザーは変更後の規約に同意したものとみなします。<br>


第11条<br>
ユーザーと当サービスとの間の通知または連絡は，当サイトの定める方法によって行うものとします。当サービスは,ユーザーから,当サービスが別途定める方式に従った変更届け出がない限り,<br>
現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い,これらは,発信時にユーザーへ到達したものとみなします。<br>

第12条<br>
ユーザーは，当サービス運営者の書面による事前の承諾なく，利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し，または担保に供することはできません。
<br>
第13条<br>
本規約の解釈にあたっては，日本法を準拠法とします。
</p>
</div>
                          </details>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
