import {Link, useForm} from '@inertiajs/inertia-react';
import React, {useState} from 'react'
import Dialog from '../../Components/Dashboard/Dialog';
import Base from '../../Layouts/Base'
import useDialog from '../../Hooks/useDialog';
import CreateUser from '../../Components/Dashboard/Users/CreateUser';
import {Inertia} from '@inertiajs/inertia';
import ViewApplication from "../../Components/Dashboard/Application/ViewApplication";
import {Button, Collapse, Form} from "react-bootstrap";

export default function Index(props) {

    const {data: guests, links, meta} = props.guests;
    const {cities, jobs, degrees} = props;

    const [open, setOpen] = useState(false);

    const [state, setState] = useState([])
    const [addDialogHandler, addCloseTrigger, addTrigger] = useDialog()
    const [UpdateDialogHandler, UpdateCloseTrigger, UpdateTrigger] = useDialog()
    const [destroyDialogHandler, destroyCloseTrigger, destroyTrigger] = useDialog()
    const openViewModal = (guest) => {
        setState(guest);
        UpdateDialogHandler()
    }

    const openDestroyDialog = (user) => {
        setState(user);
        destroyDialogHandler()
    };

    const destroyUser = () => {
        Inertia.delete(
            route('applications.destroy', state.id),
            {onSuccess: () => destroyCloseTrigger()});
    }


    const {data, setData, post, reset, errors} = useForm({
        street: "",
        age: "",
        city: "",
        degree: "",
        area: ""
    });

    const [selectedCity, setSelectedCity] = useState(null);
    const [selectedArea, setSelectedArea] = useState(null);

    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        post(route('applications.index'), {
            data,
            onSuccess: () => {
                reset(),
                    close()
            },
        });
    }

    const onCityChange = (e) => {
        setData({
            ...data,
            city: e.target.value,
            area: null,
            district: null
        })

        let city = cities.find((el) => el.id == e.target.value)
        setSelectedCity(city ?? null)
        setSelectedArea(null)
    };

    const onAreaChange = (e) => {
        setData({
            ...data,
            area: e.target.value,
            district: null
        })

        let area = selectedCity.get_city_areas.find((el) => el.id == e.target.value)
        setSelectedArea(area ?? null)
    };

    return (
        <>
            <div className="container-fluid py-4">
                <Dialog trigger={addTrigger} title="Create New User">
                    <CreateUser close={addCloseTrigger}/>
                </Dialog>

                <Dialog trigger={UpdateTrigger} title={`View application: ${state.name}`}>
                    <ViewApplication model={state} close={UpdateCloseTrigger}/>
                </Dialog>

                <Dialog trigger={destroyTrigger} title={`Delete User: ${state.name} ${state.lastname}`}>
                    <p>Are you sure to delete this application ?</p>
                    <div className="modal-footer">
                        <button type="button" className="btn bg-gradient-secondary" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" onClick={destroyUser} className="btn bg-gradient-danger">Delete</button>
                    </div>
                </Dialog>

                <div className="row pb-4">
                    <div className="col-12 w-100">
                        <div className="card h-100 w-100">
                            <div className="card-header pb-0">
                                <div className="row">
                                    <div className="col-md-6">
                                        <h6>{__('Applicants table')}</h6>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col">
                                        <>
                                            <Button
                                                onClick={() => setOpen(!open)}
                                                className="btn btn-vimeo"
                                                aria-controls="example-collapse-text"
                                                aria-expanded={open}
                                            >
                                                Filter
                                            </Button>
                                            <Collapse in={open}>
                                                <form onSubmit={onSubmit}>
                                                   <div className="row">
                                                       <div className="col-md-3 col-sm-6">
                                                           <div className="form-group">
                                                               <input
                                                                   type="text"
                                                                   className="form-control"
                                                                   name='street'
                                                                   value={data.street}
                                                                   onChange={onChange}
                                                                   id="street"
                                                                   placeholder={__('Address')}
                                                               />
                                                           </div>
                                                       </div>
                                                       <div className="col-md-3 col-sm-6">
                                                           <div className="form-group">
                                                               <input
                                                                   type="text"
                                                                   className="form-control"
                                                                   name='age'
                                                                   value={data.age}
                                                                   onChange={onChange}
                                                                   id="age"
                                                                   placeholder={__('Age')}
                                                               />
                                                           </div>
                                                       </div>
                                                       <div className="col-md-3 col-sm-6">
                                                           <Form.Select name="gender" value={data.gender} id="gender"
                                                                        onChange={onChange}
                                                                        aria-label="Select a gender">
                                                               <option value={''}>{__('Select a gender')}</option>
                                                               <option value={'1'}>{__('Male')}</option>
                                                               <option value={'0'}>{__('Female')}</option>
                                                           </Form.Select>
                                                       </div>
                                                   </div>
                                                   <div className="row">
                                                       <div className="col-md-3 col-sm-6">
                                                           <Form.Select  value={data.city} id="city"
                                                                        onChange={onCityChange}
                                                                        aria-label="Select a city">
                                                               <option
                                                                   value={''}>{__('select_a_city')}</option>
                                                               {
                                                                   cities.map((option, index) => {
                                                                       return (<option key={index}
                                                                                       value={option.id}>{option.title}</option>)
                                                                   })
                                                               }
                                                           </Form.Select>
                                                       </div>
                                                       {
                                                           data.city && selectedCity && selectedCity.get_city_areas.length ? (
                                                               <div className="col-md-3 col-sm-6">
                                                                   <div className="form-group">
                                                                       <Form.Select

                                                                           value={data.city_area}
                                                                           id="city_area"
                                                                           onChange={onAreaChange}
                                                                           aria-label="select_a_area">
                                                                           {
                                                                               selectedCity.get_city_areas.map((option, index) => {
                                                                                   return (<option
                                                                                       key={`${index}-${option.id}`}
                                                                                       value={option.id}>{option.title}</option>)
                                                                               })
                                                                           }
                                                                       </Form.Select>
                                                                       <div className="invalid-feedback">
                                                                           {__('Please_select_area')}
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           ) : null
                                                       }
                                                       {
                                                           data.area && selectedArea && selectedArea.get_city_area_districts.length ? (
                                                               <div className="col-md-3 col-sm-6">
                                                                   <div className="form-group">
                                                                       <Form.Select
                                                                            value={data.city_area_district}
                                                                           id="city_area_district"
                                                                           onChange={onChange}
                                                                           aria-label="Select_a_district">
                                                                           {
                                                                               selectedArea.get_city_area_districts.map((option, index) => {
                                                                                   return (<option
                                                                                       key={`${index}-${option.id}`}
                                                                                       value={option.id}>{option.title}</option>)
                                                                               })
                                                                           }
                                                                       </Form.Select>
                                                                       <div className="invalid-feedback">
                                                                           {__('please_select_district')}
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           ) : null
                                                       }
                                                   </div>
                                                    <div className="row my-2">
                                                        <div className="col-md-3 col-sm-6">
                                                            <Form.Select value={data.degree} id="degree"
                                                                         onChange={onChange}
                                                                         aria-label="Select a Degree">
                                                                <option
                                                                    value={''}>{__('select_a_degree')}</option>
                                                                {
                                                                    degrees.map((option, index) => {
                                                                        return (<option key={index}
                                                                                        value={option.id}>{option.title}</option>)
                                                                    })
                                                                }
                                                            </Form.Select>
                                                        </div>

                                                    </div>
                                                </form>
                                            </Collapse>
                                        </>
                                    </div>
                                </div>
                            </div>
                            <div className="card-body px-0 pt-0 pb-2">
                                <div className="table-responsive-xxl p-0" width="100%">
                                    <table className="table align-items-center justify-content-center mb-0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-centter">#</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('first name')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-left">{__('last name')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-left opacity-7 ps-2">{__('birthday')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-left opacity-7 ps-2">{__('age')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-left opacity-7 ps-2">{__('email')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-left opacity-7 ps-2">{__('degree')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-left opacity-7 ps-2">{__('created_at')}</th>
                                            <th className="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {guests.map((guest, index) => (
                                            <tr key={guest.id}>
                                                <td className='text-center'>{meta.from + guest.id}</td>
                                                <td className='text-left'>
                                                    <p className="text-sm font-weight-bold mb-0">{guest.name}</p>
                                                </td>
                                                <td className='text-left'>
                                                    <span className="text-xs font-weight-bold">{guest.lastname}</span>
                                                </td>
                                                <td className="align-middle text-left">
                                                    <div className="d-flex align-items-center text-left">
                                                        <span
                                                            className="text-xs font-weight-bold mb-0">{guest.birthday}</span>
                                                    </div>
                                                </td>
                                                <td className="align-middle text-left">
                                                    <div className="d-flex align-items-center text-left">
                                                        <span
                                                            className="text-xs font-weight-bold mb-0">{guest.age}</span>
                                                    </div>
                                                </td>
                                                <td className="align-middle text-left">
                                                    <div className="d-flex align-items-center text-left">
                                                        <span
                                                            className="text-xs font-weight-bold mb-0">{guest.city}</span>
                                                    </div>
                                                </td>
                                                <td className="align-middle text-left">
                                                    <div className="d-flex align-items-center text-left">
                                                        {
                                                            guest.educations.map((el) => (
                                                                <span
                                                                    className="text-xs font-weight-bold mb-0">{el.degree}
                                                                </span>
                                                            ))
                                                        }
                                                    </div>
                                                </td>
                                                <td className="align-middle text-left">
                                                    <div className="d-flex align-items-center text-left">
                                                        <span
                                                            className="text-xs font-weight-bold mb-0">{guest.joined}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td className="align-middle text-center" width="10%">
                                                    <div>
                                                        <button type="button" onClick={() => openViewModal(guest)}
                                                                className="btn btn-vimeo btn-icon-only mx-2">
                                                            <span className="btn-inner--icon"><i
                                                                className="fas fa-eye"></i>
                                                            </span>
                                                        </button>
                                                        <button type="button" onClick={() => openDestroyDialog(guest)}
                                                                className="btn btn-youtube btn-icon-only">
                                                            <span className="btn-inner--icon"><i
                                                                className="fas fa-trash"></i></span>
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
                        {meta.links.map((link, k) => (
                            <li key={k} className="page-item">
                                <Link disabled={link.url == null ? true : false} as="button"
                                      className={`${link.active && 'bg-info'} ${link.url == null && 'btn bg-gradient-secondary text-white'} page-link`}
                                      href={link.url || ''} dangerouslySetInnerHTML={{__html: link.label}}/>
                            </li>
                        ))}
                    </ul>
                </nav>
            </div>
        </>
    )
}

Index.layout = (page) => <Base key={page} children={page} title={"Manage Applications"}/>
