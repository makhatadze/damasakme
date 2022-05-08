import React,{useEffect, useState} from 'react'
import Loading from "../Components/Loading/Loading";
import Footer from "../Components/Footer/Footer";
import Header from "../Components/Header/Header";

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
                    <div className="container-fluid">
                        <div className="row row-height">
                            <div className="col-xl-4 col-lg-4 content-left">
                                <div className="content-left-wrapper">
                                    <div id="social">
                                        <ul>
                                            <li><a href="#0"><i className="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#0"><i className="fab fa-instagram"></i></a></li>
                                            <li><a href="#0"><i className="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <figure><img src="/images/logoooooooooo.jpg" alt="" className="img-fluid"
                                                     width="270" height="270" />
                                        </figure>
                                        <h2>{__('We are Hiring')}</h2>
                                        <p>
                                            {__('Tation argumentum et usu, dicit viderer evertitur te has.')}
                                        </p>

                                        <a href="#start" className="btn_1 rounded mobile_btn yellow">Start Now!</a>
                                    </div>
                                    <div className="copy">{__('all rights reserved')}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </>
            )}

        </>
    )
}
