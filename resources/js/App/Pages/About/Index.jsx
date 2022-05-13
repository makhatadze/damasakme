import React,{useEffect, useState} from 'react'
import Loading from "../../Components/Loading/Loading";
import Footer from "../../Components/Footer/Footer";
import Header from "../../Components/Header/Header";

export default function Index(props) {
    const [loading, setLoading] = useState(true)
    const {about} = props;
    useEffect(() => {
        setLoading(false)
    },[]);

    const createMarkup = (e) => {
        return { __html: e };
    }

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
                        <div id="sub_content_in" dangerouslySetInnerHTML={{__html: about.data.content_1}}>
                        </div>
                    </section>
                    <main id="general_page">
                        <div className="container_styled_1">
                            <div className="container margin_60_35" dangerouslySetInnerHTML={{__html: about.data.content_2}}>
                            </div>
                        </div>
                    </main>
                    <Footer/>
                </>
            )}

        </>
    )
}
