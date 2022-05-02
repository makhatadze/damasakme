import React,{useEffect, useState} from 'react'
import Loading from "../../Components/Loading/Loading";
import Footer from "../../Components/Footer/Footer";
import Header from "../../Components/Header/Header";

export default function Index() {
    const [loading, setLoading] = useState(true)
    useEffect(() => {
        setLoading(false)
    },[]);
    return (
        <>
            {loading ? (
                <Loading />
            ) : (
                <>
                    <Header />
                    <section className="parallax_window_in" data-parallax="scroll"
                             data-image-src="https://via.placeholder.com/1200" data-natural-width="1400"
                             data-natural-height="800">
                        <div id="sub_content_in">
                            <h1>About Potenza</h1>
                            <p>"Usu habeo equidem sanctus no ex melius labitur conceptam eos"</p>
                        </div>
                    </section>
                    <main id="general_page">
                        <div className="container_styled_1">
                            <div className="container margin_60_35">
                                <div className="row">
                                    <div className="col-lg-6">
                                        <h2 className="nomargin_top">Vim ridens<br/>eleifend referrentur eu</h2>
                                        <p className="lead">Ex graeco nostrud theophrastus nam, cum tibique reprimique ad. Mea
                                            omittam electram te, eu cum fastidii sapientem delicatissimi.</p>
                                        <p>
                                            Ex has nihil liberavisse philosophia. Ne mazim quidam contentiones usu. Id nec
                                            <strong>causae periculis </strong>evertitur, stet menandri an pro, his argumentum
                                            appellantur eu. An laudem efficiendi has, utinam principes consequat id vel.
                                        </p>
                                        <p>Ex graeco nostrud theophrastus nam, cum tibique reprimique ad. Mea omittam electram
                                            te, eu cum fastidii sapientem delicatissimi. Sed cu eripuit veritus propriae. An eam
                                            choro saperet ullamcorper, eam <strong>saperet rationibus</strong> ut. Cu usu tation
                                            quaeque vocibus, alterum torquatos persequeris te ius.</p>
                                    </div>
                                    <div className="col-lg-5 ml-lg-5 add_top_30">
                                        <img src="https://via.placeholder.com/500" alt="" className="img-fluid" width="500"
                                             height="360" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <Footer/>
                </>
            )}

        </>
    )
}
