import {Link} from '@inertiajs/inertia-react'
import React from 'react'
import {Dropdown} from "react-bootstrap";

export default function Sidebar() {
    return (
        <aside className="sidenav bg-default navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div className="sidenav-header">
                <i className="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none opacity-8 text-white" aria-hidden="true" id="iconSidenav" />
                <Link className="navbar-brand m-0" href={route('home')} target="_blank">
                     <img src="/img/logo-ct.png" className="navbar-brand-img h-100" alt="main_logo" />
                </Link>
            </div>
            <hr className="horizontal dark mt-0" />
            <div className="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul className="navbar-nav">
                    <li className="nav-item">
                        <Link className={`${route().current('applications.*') && 'active'} nav-link`} href={route('applications.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-single-02 text-dark text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Applications')}</span>
                        </Link>
                    </li>
                    <li className="nav-item mt-3">
                        <h6 className="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{__('Manage')}</h6>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('users.*') && 'active'} nav-link`} href={route('users.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="fas fa-user-lock text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Users')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('jobs.*') && 'active'} nav-link`} href={route('jobs.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-spaceship text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Jobs')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('degrees.*') && 'active'} nav-link`} href={route('degrees.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Degrees')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('cities.*') && 'active'} nav-link`} href={route('cities.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Cities')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('city-areas.*') && 'active'} nav-link`} href={route('city-areas.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('City Areas')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('city-area-districts.*') && 'active'} nav-link`} href={route('city-area-districts.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('City Area Districts')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('departments.*') && 'active'} nav-link`} href={route('departments.index')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Departments')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('about.*') && 'active'} nav-link`} href={route('about.edit')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('About')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('term.*') && 'active'} nav-link`} href={route('term.edit')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Term')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('social.*') && 'active'} nav-link`} href={route('social.edit')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-paper-diploma text-warning text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Social')}</span>
                        </Link>
                    </li>
                    <li className="nav-item mt-3">
                        <h6 className="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Settings</h6>
                    </li>
                    <li className="nav-item">
                        <Link className={`${route().current('profile') && 'active'} nav-link`} href={route('profile')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i className="ni ni-single-02 text-dark text-sm opacity-10" />
                            </div>
                            <span className="nav-link-text ms-1">{__('Profile')}</span>
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link " as='a' method='post' href={route('logout')}>
                            <div className="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i className="fas fa-sign-out-alt text-danger text-sm opacity-10"/>
                            </div>
                            <span className="nav-link-text ms-1">{__('Log out')}</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </aside>
    )
}
