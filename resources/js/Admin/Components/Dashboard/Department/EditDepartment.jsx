import {useForm, usePage} from '@inertiajs/inertia-react'
import React, { useEffect } from 'react'
import {Tab, Tabs} from "react-bootstrap";

export default function EditDepartment({close, model}) {

    const {locales} = usePage().props;

    const localeAttr = [];
    locales.forEach((el) => {
        localeAttr[el] = {
            title: '',
            working: ''
        }
    })

    const {data, setData, put, reset, errors} = useForm({
        phone: model.phone,
        email: model.email,
        ...localeAttr
    });

    function setTranslationData (model) {
        if (!model.translations) {
            return
        }
        const localeAttr = [];
        locales.forEach((el) => {
            let title = ''
            let working = ''
            if (model.translations) {
                let translation = model.translations.find((tr) => tr.locale === el)
                if (translation) {
                    title = translation.title
                    working = translation.working
                }
            }
            localeAttr[el] = {
                title: title,
                working: working,
            }
        })
        return localeAttr;
    }

    const handleLocaleChange = (index, event) => {
        const values = data;
        const updatedValue = event.target.name;
        values[index][updatedValue] = event.target.value;
        setData(values);
    };
    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        put(route('departments.update', model.id), {
            data, 
            onSuccess: () => {
                reset(),
                close()
            }, 
        });
    }

    useEffect(() => {
        setData({...data,
            phone: model.phone,
            email: model.email,
            ...setTranslationData(model)
        });
    }, [model]);

    return (
        <>
            <form onSubmit={onSubmit}>
                <div className="modal-body">
                    <div className="form-group">
                        <label htmlFor="phone" className="col-form-label">{__('Phone')}</label>
                        <input type="text" className="form-control" name='phone' value={data.phone} onChange={onChange} id="phone"/>
                        {errors && <div className='text-danger mt-1'>{errors.phone}</div>}
                    </div>
                    <div className="form-group">
                        <label htmlFor="email" className="col-form-label">{__('Email')}</label>
                        <input type="text" className="form-control" name='email' value={data.email} onChange={onChange} id="email"/>
                        {errors && <div className='text-danger mt-1'>{errors.email}</div>}
                    </div>
                    <Tabs className="mb-3">
                        {
                            locales.map((locale) => (
                                <Tab eventKey={locale} title={locale} key={locale}>
                                    <div className="form-group">
                                        <label htmlFor="title" className="col-form-label">{__('Title')}:</label>
                                        <input type="text" className="form-control" name={'title'} defaultValue={data[locale] ? data[locale].title : ''}
                                               onChange={(event) =>
                                                   handleLocaleChange(locale, event)
                                               } id="title"/>
                                        {errors && <div className='text-danger mt-1'>{errors[`${locale}.title`]}</div>}
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="title" className="col-form-label">{__('Working')}:</label>
                                        <input type="text" className="form-control" name={'working'} defaultValue={data[locale] ? data[locale].working : ''}
                                               onChange={(event) =>
                                                   handleLocaleChange(locale, event)
                                               } id="working"/>
                                        {errors && <div className='text-danger mt-1'>{errors[`${locale}.working`]}</div>}
                                    </div>
                                </Tab>
                            ))
                        }
                    </Tabs>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn bg-gradient-secondary" data-bs-dismiss="modal">{__('Close')}</button>
                    <button type="submit" className="btn bg-gradient-primary">{__('Update')}</button>
                </div>
            </form>
        </>

    )
}
