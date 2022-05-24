import React, {useState} from "react";
import "./Header.css";
import {Link, usePage} from "@inertiajs/inertia-react";

const Header = () => {
    const [showMenu, setShowMenu] = useState(false)
    const {social} = usePage().props;

    return (
        <header>
            <div className="container-fluid">
                <div className="row">
                    <div className="col-3">
                        <Link href={route('home')}>
                            <img src="/images/logoooooooooo.jpg" alt="" width="45" height="45"/>
                        </Link>
                    </div>
                    <div className="col-9">
                        <div id="social">
                            <ul>
                                <li>
                                    <a href={social.facebook} target="_blank">
                                        <i className="fab fa-facebook-f"/>
                                    </a>
                                </li>
                                <li>
                                    <a href={social.instagram} target="_blank">
                                        <i className="fab fa-instagram"/>
                                    </a>
                                </li>
                                <li>
                                    <a href={social.linkedin} target="_blank">
                                        <i className="fab fa-linkedin-in"/>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a onClick={() => setShowMenu(!showMenu)}
                           className={`cursor-pointer cd-nav-trigger ${showMenu ? "close-nav" : ""}`}>

                            <span className="cd-icon"/>
                        </a>
                        <nav>
                            <ul className={`cd-primary-nav ${showMenu ? "fade-in" : ""}`}>
                                <li>
                                    <Link href={route('home')} className="animated_link">
                                        {__('Home')}
                                    </Link>
                                </li>
                                <li>
                                    <Link href={route('about')} className="animated_link">
                                        {__('About_Us')}
                                    </Link>
                                </li>
                                <li>
                                    <Link href={route('contact')} className="animated_link">
                                        {__('Contact_Us')}
                                    </Link>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    )
};

export default Header;
