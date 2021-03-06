import { Link } from '@inertiajs/inertia-react';
import React, { useState } from 'react'
import Dialog from '../../Components/Dashboard/Dialog';
import Base from '../../Layouts/Base'
import useDialog from '../../Hooks/useDialog';
import { Inertia } from '@inertiajs/inertia';
import {Tab, Tabs} from "react-bootstrap";
import CreateDepartment from "../../Components/Dashboard/Department/CreateDepartment";
import EditDepartment from "../../Components/Dashboard/Department/EditDepartment";

export default function Index(props) {

    const {data: departments, meta} = props.departments;
    const [state, setState] = useState([])
    const [addDialogHandler, addCloseTrigger,addTrigger] = useDialog()
    const [UpdateDialogHandler, UpdateCloseTrigger,UpdateTrigger] = useDialog()
    const [destroyDialogHandler, destroyCloseTrigger,destroyTrigger] = useDialog()
    const openUpdateDialog = (department) => {
        setState(department);
        UpdateDialogHandler()
    }

    const openDestroyDialog = (department) => {
        setState(department);
        destroyDialogHandler()        
    };

    const destroyUser = () => {
        Inertia.delete(
            route('departments.destroy', state.id),
            { onSuccess: () => destroyCloseTrigger() });
    }

    return (
        <>
            <div className="container-fluid py-4">
                <Dialog trigger={addTrigger} title={__('Create New Department')}>
                    <CreateDepartment close={addCloseTrigger}/>
                </Dialog>

                <Dialog trigger={UpdateTrigger} title={`${__('Update Department')}: ${state.id}`}>
                    <EditDepartment model={state} close={UpdateCloseTrigger}/>
                </Dialog>

                <Dialog trigger={destroyTrigger} title={`Delete Department: ${state.id}`}>
                    <p>{__('Are you sure to delete this Department ?')}</p>
                    <div className="modal-footer">
                        <button type="button" className="btn bg-gradient-secondary" data-bs-dismiss="modal">{__('Close')}</button>
                        <button type="submit" onClick={destroyUser} className="btn bg-gradient-danger">{__('Delete')}</button>
                    </div>
                </Dialog>

                <div className="row pb-4">
                    <div className="col-12 w-100">
                        <div className="card h-100 w-100">                            
                            <div className="card-header pb-0">
                            <div className="row">
                                <div className="col-md-6">
                                    <h6>{__('Departments table')}</h6>
                                </div>
                                <div className="col-md-6 d-flex justify-content-end">
                                    <button onClick={addDialogHandler} type="button" className="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
                                        {__('Create New Department')}
                                    </button>
                                </div>
                            </div>
                            </div>
                            <div className="card-body px-0 pt-0 pb-2">
                            <div className="table-responsive-xxl p-0" width="100%">
                                <table className="table align-items-center justify-content-center mb-0" width="100%">
                                    <thead>
                                        <tr>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('Phone')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('Email')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('Title')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('Working')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{__('Actions')}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {departments.map((department, index) => (
                                            <tr key={department.id}>
                                                <td className='text-center'>{meta.from + index}</td>
                                                <td className='text-center'>{department.phone}</td>
                                                <td className='text-center'>{department.email}</td>
                                                <td className='text-left'>
                                                        <Tabs className="mb-3">
                                                            {
                                                                department.translations.map(({locale,title}) => (
                                                                    <Tab eventKey={locale} title={locale} key={locale}>
                                                                        <div className="my-auto">
                                                                            <h6 className="mb-0 text-sm">{title}</h6>
                                                                        </div>
                                                                    </Tab>
                                                                ))
                                                            }
                                                        </Tabs>
                                                </td>
                                                <td className='text-left'>
                                                    <Tabs className="mb-3">
                                                        {
                                                            department.translations.map(({locale,working}) => (
                                                                <Tab eventKey={locale} title={locale} key={locale}>
                                                                    <div className="my-auto">
                                                                        <h6 className="mb-0 text-sm">{working}</h6>
                                                                    </div>
                                                                </Tab>
                                                            ))
                                                        }
                                                    </Tabs>
                                                </td>
                                                <td className="align-middle text-center" width="10%">
                                                <div>
                                                    <button type="button" onClick={() => openUpdateDialog(department)} className="btn btn-vimeo btn-icon-only mx-2">
                                                        <span className="btn-inner--icon"><i className="fas fa-pencil-alt"/></span>
                                                    </button>
                                                    <button type="button" onClick={() => openDestroyDialog(department)} className="btn btn-youtube btn-icon-only">
                                                        <span className="btn-inner--icon"><i className="fas fa-trash"/></span>
                                                    </button>
                                                </div>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul className="pagination justify-content-center">
                        { meta.links.map((link, k) => (
                            <li key={k} className="page-item">
                                <Link disabled={link.url == null} as="button" className={`${link.active && 'bg-info'} ${link.url == null && 'btn bg-gradient-secondary text-white'} page-link`} href={link.url || ''} dangerouslySetInnerHTML={{ __html: link.label }}/>
                            </li>
                        ))}
                    </ul>
                </nav>
            </div>
        </>
    )
}

Index.layout = (page) => <Base key={page} children={page} title={__('Manage Departments')}/>
