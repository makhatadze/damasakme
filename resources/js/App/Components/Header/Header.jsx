import React, {useState} from "react";
import "./Header.css";
import {Link} from "@inertiajs/inertia-react";

const Header = () => {
    const [showMenu, setShowMenu] = useState(false)

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
                                    <a href="#">
                                        <i className="fab fa-facebook-f"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i className="fab fa-instagram"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
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
                                    <a href="about.html" className="animated_link">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us.html" className="animated_link">
                                        Contact Us
                                    </a>
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
