@extends('home.layouts')
@section('main_content')

    <div class="page-banner page-banner-subpage p-b-0 text-center">
        <div class="container">
            <div class="banner-slogan banner-slogan-hero">
                <h1 class="slogan-title">条约</h1>
            </div>
            <div class="banner-tabs tabs-responsive">
                @include('home.subpage.tos_sub')
            </div>
        </div>
    </div>
    <!-- /.page-banner -->

    <div class="page-section">
        <div class="container">

            <p>最后更新：2016年6月20日</p>

            <div class="section-row row">
                <div class="col-sm-8">
                    <h2>100%的全网正常运行时间保证</h2>
                    {{$app_config['website_name']}}提供基于网络和节点主机100%的正常运行时间保证，总的来说，这些保证是作为<a href="{{url('/home/tos')}}">服务条款</a>的一个补充。阁下成为{{$app_config['website_name']}}的客户时，这些条款就将自动生效，并成为{{$app_config['website_name']}}整个服务周期中不可或缺的一部分。<br/>
                    <br/> 这些保证适用于阁下的每一个产品 / 服务，而不是适用于所有账单。以下情况不适用于该SLA。
                    <br/>1) 阁下所购买服务的正常例行维护，我们会提前通知阁下，并通知调整流量策略和DNS策略临时迁移阁下的服务到可以正常使用的部分。但由于阁下网络服务提供商造成的调整延迟；
                    <br/>2) {{$app_config['website_name']}}提供的API、控制面板和中继服务器、路由器插件等；
                    <br/>3) 客户在购买前已经被告知该服务属于单节点服务，不能提供SLA的。
                </div>
                <div class="col-sm-4">
                    <p class="h6 m-t-h2">更简单地说：</p>
                    <p class="legal-simple">
                        我们的平台是非常可靠的！有完善的质量保证！<br/>
                        <br/> 在遭遇突发情况时，阁下将可以获得补偿，比如{{$app_config['website_name']}}“补偿时间”。
                    </p>
                </div>
            </div>

            <div class="section-row row">
                <div class="col-sm-8">
                    <h2>丢包和延迟</h2>
                    {{$app_config['website_name']}}会主动监测{{$app_config['website_name']}}各连接点的链路情况，并在出现网络波动时尽可能调整网络策略以减少波动可能带来的影响。{{$app_config['website_name']}}的全球加速网络在所在地境内的链路是0丢包和低延迟的，但当客户在其所在国家的网络连接时，可能会因为线缆质量、运营商路由策略、用户宽带使用和其他因素造成丢包和高延迟。在这种情况下，
                    我们会提供{{$app_config['website_name']}}全球优化网络，通过骨干网络和CN2网络中继，来对用户提供更加稳定和低延迟的连接，用户可以在产品中选购此项目，此项目适用于SLA保证。<br/>
                    <br/>{{$app_config['website_name']}}所提供的概念加速服务，其目的是为了突破网络审查，建立快速的连接到目标服务器，因此在加速策略上更偏向于使用拥有较大带宽和中等连接质量的中国电信骨干网接入（ChinaNet
                    Backbone）；部分高质量线路的目标是建立尽可能低延迟和高稳定性的连接到目标服务器，因此在加速策略上偏向于中等连接速度和高连接质量的中国电信CN2网络和各国直连优化链路。不同的服务适用于不同的SLA等级。
                </div>
                <div class="col-sm-4">
                    <p class="h6 m-t-h2">更简单地说：</p>
                    <p class="legal-simple">
                        我们的加速网络工作在0%丢包的环境下，这适用于{{$app_config['website_name']}}加速网络到骨干线路的情况。如果阁下发现丢包，请联系我们，一般情况下，5%以下的丢包属于正常情况。具体视阁下的本地网络到国家骨干网络节点的情况。该SLA不适用于国家骨干网络BGP路由和运营商路由调整造成的丢包
                        / 高延迟情况。
                    </p>
                </div>
            </div>

            <div class="section-row row">
                <div class="col-sm-8">
                    <h2>限制</h2>
                    该正常运行时间保证只适用于用户正常使用{{$app_config['website_name']}}所提供服务的情况下。特别低，对于私有线路的用户而言，由于拥有更高的连接点控制权限，同时客户可以选择使用更高级别但可能造成不稳定现象的TCP加速技术，因此将不适用于此SLA。如果用户使用{{$app_config['website_name']}}加速网络进行违反用户和连接点所在地相关法律法规和{{$app_config['website_name']}}服务条款的行为，将不再适用于此SLA。<br/>
                    <br/>当{{$app_config['website_name']}}对连接点软件和硬件进行例行维护时，将会提前24小时通知用户，对于紧急发生的问题，{{$app_config['website_name']}}将在10-30分钟内处理完成，并保证同可用区仍然有正常工作的连接点以供用户使用。所有连接点的维护时长不应长于24小时，否则{{$app_config['website_name']}}的用户将收到{{$app_config['website_name']}}“补偿时间”的补偿。
                </div>
                <div class="col-sm-4">
                    <p class="h6 m-t-h2">更简单地说：</p>
                    <p class="legal-simple">
                        该SLA适用于用户正确地使用{{$app_config['website_name']}}所提供服务。当用户因为其他软硬件问题和错误配置的情况下，SLA将不适用。另外，{{$app_config['website_name']}}将可以对连接点进行例行维护，除非所需时间超过30分钟。
                    </p>
                </div>
            </div>

            <div class="section-row row">
                <div class="col-sm-8">
                    <h2>中断补偿</h2>
                    当该SLA未能达到所承诺项目时，用户应当开启一个工单到{{$app_config['website_name']}}，并清楚描述所发生问题和发生时间。仅仅抱怨相关的中断不会得到任何“补偿时间”补偿。{{$app_config['website_name']}}将在收到工单后检查是否发生了对应问题及用户是否在受补偿范围内，如果确认了该补偿，则“补偿时间”将会在24小时内发放到用户的账户中。<br/>
                    <br/>
                    <table class="table">
                        <tr>
                            <th>中断时长</th>
                            <th>补偿时间</th>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>低于60分钟</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>1天</td>
                        </tr>
                        <tr>
                            <td>60 - 120分钟</td>
                            <td>3天</td>
                        </tr>
                        <tr>
                            <td>120 - 360分钟</td>
                            <td>5天</td>
                        </tr>
                        <tr>
                            <td>360 - 720分钟</td>
                            <td>10天</td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>超过720分钟</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>15天</td>
                        </tr>
                    </table>
                    <br/>
                    <h3>如何获取补偿时间</h3>
                    为了获取SLA中断所提供的补偿，阁下应当开启一个工单到{{$app_config['website_name']}}，并明确要求获取相关的补偿。一些中断可能并不是{{$app_config['website_name']}}连接点故障引起的，而可能是用户自身网络和设定问题导致的。所以，在阁下开启工单到{{$app_config['website_name']}}之前，我们可能无法意识到发生了任何问题，非{{$app_config['website_name']}}所提供的服务和软硬件支持不适用于此SLA中断补偿。<br/>
                    <br/>
                    阁下可以通过工单发起这样的一个补偿请求，阁下必须要提供一个{{$app_config['website_name']}}的产品编号，并且该工单中要描述服务中断的问题和发生时间，中断时长（正如前文所述）。这将帮助{{$app_config['website_name']}}判断是否发生了对应的服务中断问题。如果{{$app_config['website_name']}}主动意识到了服务中断问题，阁下仍然可以通过工单来要求“补偿时间”的补偿，以便{{$app_config['website_name']}}知道阁下发生了服务中断的问题。值得注意的是，阁下必须拥有受到SLA保证的服务，才能向{{$app_config['website_name']}}请求“补偿时间”补偿。
                    <br/>
                    <br/> 阁下必须同意并承认其他所有条款、限制、免责声明、例外情况和 <a href="{{url('/home/tos')}}">服务条款</a> 才能适用于本服务等级协议。
                </div>
                <div class="col-sm-4">
                    <p class="h6 m-t-h2">更简单地说：</p>
                    <p class="legal-simple">
                        开启一个工单来报告中断并获取“补偿时间”！
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection