import {useForm, usePage} from '@inertiajs/inertia-react'
import React from 'react'
import {Tab, Tabs} from "react-bootstrap";

export default function CreateDegree({close}) {
    const {locales} = usePage().props;
    const localeAttr = [];
    locales.forEach((el) => {
        localeAttr[el] = {
            title: ''
        }
    })

    const {data, setData, post, reset, errors} = useForm({
        ...localeAttr
    });

    const handleLocaleChange = (index, event) => {
        const values = data;
        const updatedValue = event.target.name;
        values[index][updatedValue] = event.target.value;

        setData(values);
    };
    const onSubmit = (e) => {
        e.preventDefault();
        post(route('degrees.store'), {
            data,
            onSuccess: () => {
                reset(),
                    close()
            },
        });
    }

    return (
        <>
            <form onSubmit={onSubmit}>
                <div className="modal-body">
                    <Tabs className="mb-3">
                        {
                            locales.map((locale) => (
                                <Tab eventKey={locale} title={locale} key={locale}>
                                    <div className="form-group">
                                        <label htmlFor="title" className="col-form-label">{__('Title')}:</label>
                                        <input type="text" className="form-control" name={'title'} value={data.name}
                                               onChange={(event) =>
                                                   handleLocaleChange(locale, event)
                                               } id="title"/>
                                        {errors && <div className='text-danger mt-1'>{errors[`${locale}.title`]}</div>}
                                    </div>
                                </Tab>
                            ))
                        }
                    </Tabs>

                </div>
                <div className="modal-footer">
                    <button type="button" className="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">{__('Close')}</button>
                    <button type="submit" className="btn bg-gradient-primary">{__('Save')}</button>
                </div>
            </form>
        </>

    )
}
