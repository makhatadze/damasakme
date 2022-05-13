import React, {useEffect, useState} from 'react'
import Loading from "../../Components/Loading/Loading";
import Footer from "../../Components/Footer/Footer";
import Header from "../../Components/Header/Header";
import "./Index.css"

export default function Index(props) {
    const departments = props.departments
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
                    <Header/>
                    <main id="general_page">
                        <div className="container margin_60_35">
                            <div className="row">

                                <aside className="col-lg-6">
                                    <div className="box_style_2">

                                        <hr className="styled"/>
                                        <h4>{__('Departmens')}</h4>
                                        <ul className="contacts_info">
                                            {departments.map((department) => (
                                                <li>
                                                    {department.title}
                                                    <br/>
                                                    <a className="contact-link" href={`tel://${department.phone}`}>{department.phone}</a>
                                                    <br/>
                                                    <a className="contact-link" href={`mailto:${department.email}`}>{department.email}</a>
                                                    <br/>
                                                    <small>{department.working}</small>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </main>
                    <Footer/>
                </>
            )}

        </>
    )
}
